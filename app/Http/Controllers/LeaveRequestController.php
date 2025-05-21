<?php

namespace App\Http\Controllers;

use App\Mail\LeaveRequestSubmittedMail;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveRequestController extends Controller
{

    public function index()
    {

        if (auth()->user()->hasRole('employee')) {
            $leaves = LeaveRequest::where('employee_id', auth()->id())->latest()->get();
        } else {
            $leaves = LeaveRequest::with('employee')->latest()->get();
        }

        return view('panel.essential.leave_request.view', compact('leaves'));
    }


    public function create()
    {
        return view('panel.essential.leave_request.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'leave_type' => 'required|string',
            'reason' => 'nullable|string',
        ]);

        // ---------------------- sending mail to admin and hr's ---------------------------------

        $users = \App\Models\User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'hr']);
        })->get();


        foreach ($users as $user) {

            Mail::to($user->email)->send(new LeaveRequestSubmittedMail(
                $user,
                $validated['leave_type'],
                $validated['start_date'],
                $validated['end_date'],
                $validated['reason'],
                auth()->user()->name
            ));

        }

        // ---------------------- Insert leave request to database ---------------------------------

        LeaveRequest::create([
            'employee_id' => auth()->id(),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'leave_type' => $validated['leave_type'],
            'reason' => $validated['reason'],
        ]);


        return redirect()->route('leave_notices.index')->with('success', 'Leave request submitted successfully.');
    }

    public function show($id)
    {
        $leave = LeaveRequest::find($id);

        if (!$leave) {
            return "leave request not found";
        }

        return view('panel.essential.leave_request.view_single', compact('leave'));
    }

    public function update(Request $request, $id)
    {

//        ----------------------------- If user is a manager or employee -----------------------------

        if (auth()->user()->hasRole('manager') || auth()->user()->hasRole('employee')) {
            return back()->with('error', 'You are not authorized to perform this action.');
        }

        $leave = LeaveRequest::findOrFail($id);

        if ($leave->status !== 'Pending') {
            return back()->with('error', 'Action already taken on this request.');
        }

        $validated = $request->validate([
            'admin_comment' => 'nullable|string|max:1000',
            'action' => 'required|in:approve,reject',
        ]);

        $leave->status = $validated['action'] === 'approve' ? 'Approved' : 'Rejected';
        $leave->admin_comment = $validated['admin_comment'];
        $leave->save();

        // ------------------------------ Approval about leave request user will get a mail ------------------------------

        $user = $leave->employee;

        Mail::to($user->email)->send(new LeaveRequestSubmittedMail(
            $user,
            $leave->status,
            $leave->admin_comment,
            $leave->leave_type,
            $leave->start_date,
            $leave->end_date
        ));


        return back()->with('success', 'Leave request has been ' . strtolower($leave->status) . '.');
    }

    public function destroy($id)
    {
        if (!auth()->user()->hasRole('admin')) {
            return back()->with('error', 'You are not authorized to perform this action.');
        }

        $leave_request = LeaveRequest::find($id);

        if (!$leave_request) {
            return back()->with('error', 'Leave request not found.');
        }

        $leave_request->delete();

        return back()->with('success', 'Leave request deleted successfully.');

    }

}

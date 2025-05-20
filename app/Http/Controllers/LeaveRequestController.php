<?php

namespace App\Http\Controllers;

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

        LeaveRequest::create([
            'employee_id' => auth()->id(),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'leave_type' => $validated['leave_type'],
            'reason' => $validated['reason'],
        ]);

        // ---------------------- sending mail to admin and hr's ---------------------------------

        $users = \App\Models\User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'hr']);
        })->get();


        foreach ($users as $user) {
            Mail::send('emails.leave_request', [
                'user' => $user,
                'leave_type' => $validated['leave_type'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'reason' => $validated['reason'],
                'submitted_by' => auth()->user()->name,
            ], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('New Leave Request Submitted');
            });
        }

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

        Mail::send('emails.leave_status_update', [
            'user' => $user,
            'status' => $leave->status,
            'admin_comment' => $leave->admin_comment,
            'leave_type' => $leave->leave_type,
            'start_date' => $leave->start_date,
            'end_date' => $leave->end_date,
        ], function ($message) use ($user, $leave) {
            $message->to($user->email)
                ->subject('Your Leave Request has been ' . $leave->status);
        });


        return back()->with('success', 'Leave request has been ' . strtolower($leave->status) . '.');
    }

}

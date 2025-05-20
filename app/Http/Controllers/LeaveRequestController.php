<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{

    public function index()
    {

        if (auth()->user()->hasRole('employee')) {
            $leaves = LeaveRequest::where('employee_id', auth()->id())->latest()->get();
        }else{
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

        return back()->with('success', 'Leave request submitted successfully.');
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

        return back()->with('success', 'Leave request has been ' . strtolower($leave->status) . '.');
    }

}

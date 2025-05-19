<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{

    public function index()
    {
        $leaves = LeaveRequest::with('employee')->latest()->get();
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
        $leave = LeaveRequest::findOrFail($id);
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected'
        ]);

        $leave->update(['status' => $request->status]);

        return back()->with('success', 'Leave status updated.');
    }
}

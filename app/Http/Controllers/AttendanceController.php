<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    // ------------------------------------------------ Employee attendance main function ------------------------------------------------

    public function toggle(Request $request)
    {
        $input = $request->validate([
            'employee_id' => 'required',
        ]);

// --------------------------- checking if employee exists ---------------------------
        
        $user = User::find($input['employee_id']);

        if (!$user) {
            return response()->json([
                'message' => 'Employee not found',
                'type' => 'error',
            ], 404);
        }


        $employeeId = $request->employee_id;
        $today = now()->toDateString();

        $attendance = Attendance::firstOrNew([
            'employee_id' => $employeeId,
            'date' => $today,
        ]);

        // CASE 1: First attendance today — Check-in
        if (!$attendance->exists || !$attendance->check_in_time) {
            $attendance->check_in_time = now();
            $attendance->status = 'Present';
            $attendance->save();

            return response()->json([
                'message' => 'Checked in successfully',
                'type' => 'check-in',
                'data' => $attendance
            ]);
        }

        // CASE 2: Already checked in, now checking out
        if (!$attendance->check_out_time) {
            $checkIn = Carbon::parse($attendance->check_in_time);
            $checkOut = now();
            $hours = $checkIn->diffInMinutes($checkOut) / 60;

            $attendance->check_out_time = $checkOut;
            $attendance->working_hours = round($hours, 2);
            $attendance->save();

            return response()->json([
                'message' => 'Checked out successfully',
                'type' => 'check-out',
                'data' => $attendance
            ]);
        }

        // CASE 3: Already checked in & out
        return response()->json([
            'message' => 'Attendance already completed for today',
            'type' => 'done',
            'data' => $attendance
        ]);
    }

    // ------------------------------------------------ Employee attendance list ------------------------------------------------

    public function index()
    {
        if (Auth::user()->hasRole('employee')) {
            $attendances = Attendance::with('employee')->where('employee_id', \auth()->id())->get();
        } else {
            $attendances = Attendance::with('employee')->get();
        }

        return view('panel.essential.attendance.view', compact('attendances'));
    }


    // ------------------------------------------------ Employee attendance data edit ------------------------------------------------


    public function edit($id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return "Attendance data not found.";
        }

        return view('panel.essential.attendance.edit', compact('attendance'));
    }

    // ---------------------------------------------- Employee attendance data update ----------------------------------------------

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only([
            'check_in_time', 'check_out_time', 'status', 'working_hours'
        ]));

        return $this->index();
    }


}

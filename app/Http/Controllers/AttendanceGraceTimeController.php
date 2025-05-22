<?php

namespace App\Http\Controllers;

use App\Models\AttendanceGraceTime;
use Illuminate\Http\Request;

class AttendanceGraceTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceGraceTime $attendanceGraceTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceGraceTime $attendanceGraceTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $attendanceGraceTime = AttendanceGraceTime::first();

        $attendanceGraceTime->update([
            'value' => $request->input('value'),
        ]);

        return redirect()->back()->with('success', 'Attendance grace time updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceGraceTime $attendanceGraceTime)
    {
        //
    }
}

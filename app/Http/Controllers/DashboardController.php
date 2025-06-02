<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {

//   ----------------------------- If user is an admin - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('admin')) {

            // -------------------- Attendances  --------------------

            if (Auth::user()->hasRole('employee')) {
                $attendances = Attendance::with('employee')->where('employee_id', \auth()->id())->get();
            } else {
                $attendances = Attendance::with('employee')->get();
            }

            // -------------------- Announcements  --------------------

            $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie

            $notices = Notice::where('status', 'published')
                ->whereJsonContains('visible_to_roles', $userRole)
                ->latest()
                ->get();

            return view('panel.admin.dashboard', compact('attendances','notices'));
        }

//   ----------------------------- If user is a hr - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('hr')) {
            return view('panel.hr.dashboard');
        }

//   ----------------------------- If user is a manager - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('manager')) {
            return view('panel.manager.dashboard');
        }

//   ----------------------------- If user is employee - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('employee')) {
            return view('panel.employee.dashboard');
        }

        abort(403);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

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
            return $this->admin_functions();
        }

//   ----------------------------- If user is a hr - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('hr')) {
            return $this->hr_functions();
        }

//   ----------------------------- If user is a manager - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('manager')) {
            return $this->manager_functions();
        }

//   ----------------------------- If user is employee - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('employee')) {
            return $this->employee_functions();
        }

        abort(403);
    }

    public function admin_functions()
    {
        // -------------------- Attendances  --------------------

        $attendances = Attendance::with('employee')->get();

        // -------------------- Announcements  --------------------

        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie

        $notices = Notice::where('status', 'published')
            ->whereJsonContains('visible_to_roles', $userRole)
            ->latest()
            ->take(4)
            ->get();

        return view('panel.admin.dashboard', compact('attendances', 'notices'));
    }

    public function hr_functions()
    {
        // -------------------- Attendances  --------------------

        $attendances = Attendance::with('employee')->get();

        // -------------------- Announcements  --------------------

        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie

        $notices = Notice::where('status', 'published')
            ->whereJsonContains('visible_to_roles', $userRole)
            ->latest()
            ->take(4)
            ->get();

        return view('panel.hr.dashboard', compact('attendances', 'notices'));
    }


    public function manager_functions()
    {
        // -------------------- Attendances  --------------------

        $attendances = Attendance::with('employee')->get();

        // -------------------- Announcements  --------------------

        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie

        $notices = Notice::where('status', 'published')
            ->whereJsonContains('visible_to_roles', $userRole)
            ->latest()
            ->take(4)
            ->get();

        return view('panel.manager.dashboard', compact('attendances', 'notices'));
    }

    public function employee_functions()
    {
        // -------------------- Attendances  --------------------

        $attendances = Attendance::where('employee_id', \auth()->id())->get();

        // -------------------- Announcements  --------------------

        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie

        $notices = Notice::where('status', 'published')
            ->whereJsonContains('visible_to_roles', $userRole)
            ->latest()
            ->take(4)
            ->get();

        return view('panel.employee.dashboard', compact('attendances', 'notices'));
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

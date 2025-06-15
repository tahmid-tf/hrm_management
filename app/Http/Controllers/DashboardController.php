<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

//   ----------------------------- If user is on hold - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('hold')) {
            abort(403);
        }

        abort(403);
    }

    public function admin_functions()
    {

//        // -------------------- Attendances  --------------------
//
//        $attendances = Attendance::with('employee')->get();
//
//        // -------------------- Announcements  --------------------
//
//        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie
//
//        $notices = Notice::where('status', 'published')
//            ->whereJsonContains('visible_to_roles', $userRole)
//            ->latest()
//            ->take(4)
//            ->get();
//
//        return view('panel.admin.dashboard', compact('attendances', 'notices'));

        // Cache attendances
        $attendances = Cache::remember('admin_attendances', 60, function () {
            return Attendance::with('employee')->get();
        });

        // Get current user's role
        $userRole = Auth::user()->getRoleNames()->first();

        // Cache notices per role
        $notices = Cache::remember("admin_notices_{$userRole}", 60, function () use ($userRole) {
            return Notice::where('status', 'published')
                ->whereJsonContains('visible_to_roles', $userRole)
                ->latest()
                ->take(4)
                ->get();
        });

        return view('panel.admin.dashboard', compact('attendances', 'notices'));
    }

    public function hr_functions()
    {
//        // -------------------- Attendances  --------------------
//
//        $attendances = Attendance::with('employee')->get();
//
//        // -------------------- Announcements  --------------------
//
//        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie
//
//        $notices = Notice::where('status', 'published')
//            ->whereJsonContains('visible_to_roles', $userRole)
//            ->latest()
//            ->take(4)
//            ->get();
//
//        return view('panel.hr.dashboard', compact('attendances', 'notices'));

        // Cache attendances for HR
        $attendances = Cache::remember('hr_attendances', 60, function () {
            return Attendance::with('employee')->get();
        });

        // Get user's role
        $userRole = Auth::user()->getRoleNames()->first();

        // Cache notices specific to HR role
        $notices = Cache::remember("hr_notices_{$userRole}", 60, function () use ($userRole) {
            return Notice::where('status', 'published')
                ->whereJsonContains('visible_to_roles', $userRole)
                ->latest()
                ->take(4)
                ->get();
        });

        return view('panel.hr.dashboard', compact('attendances', 'notices'));
    }


    public function manager_functions()
    {
//        // -------------------- Attendances  --------------------
//
//        $attendances = Attendance::with('employee')->get();
//
//        // -------------------- Announcements  --------------------
//
//        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie
//
//        $notices = Notice::where('status', 'published')
//            ->whereJsonContains('visible_to_roles', $userRole)
//            ->latest()
//            ->take(4)
//            ->get();
//
//        return view('panel.manager.dashboard', compact('attendances', 'notices'));

        // Cache attendances for manager
        $attendances = Cache::remember('manager_attendances', 60, function () {
            return Attendance::with('employee')->get();
        });

        // Get current user's role
        $userRole = Auth::user()->getRoleNames()->first();

        // Cache notices based on role
        $notices = Cache::remember("manager_notices_{$userRole}", 60, function () use ($userRole) {
            return Notice::where('status', 'published')
                ->whereJsonContains('visible_to_roles', $userRole)
                ->latest()
                ->take(4)
                ->get();
        });

        return view('panel.manager.dashboard', compact('attendances', 'notices'));
    }

    public function employee_functions()
    {
//        // -------------------- Attendances  --------------------
//
//        $attendances = Attendance::where('employee_id', \auth()->id())->get();
//
//        // -------------------- Announcements  --------------------
//
//        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie
//
//        $notices = Notice::where('status', 'published')
//            ->whereJsonContains('visible_to_roles', $userRole)
//            ->latest()
//            ->take(4)
//            ->get();
//
//        return view('panel.employee.dashboard', compact('attendances', 'notices'));

        $userId = auth()->id();

        // Cache attendances per employee
        $attendances = Cache::remember("employee_attendances_{$userId}", 60, function () use ($userId) {
            return Attendance::where('employee_id', $userId)->get();
        });

        // Get current user's role
        $userRole = Auth::user()->getRoleNames()->first();

        // Cache notices per role
        $notices = Cache::remember("employee_notices_{$userRole}", 60, function () use ($userRole) {
            return Notice::where('status', 'published')
                ->whereJsonContains('visible_to_roles', $userRole)
                ->latest()
                ->take(4)
                ->get();
        });

        return view('panel.employee.dashboard', compact('attendances', 'notices'));
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}

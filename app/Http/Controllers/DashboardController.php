<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

//   ----------------------------- If user is an admin - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('admin')) {
            return view('panel.admin.dashboard');
        }

//   ----------------------------- If user is a hr - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('hr')) {
            return view('panel.hr.dashboard');
        }

//   ----------------------------- If user is a manager - Tahmid Ferdous -----------------------------

        if (auth()->user()->hasRole('manager')) {
            return view('panel.manager.dashboard');
        }

        abort(403);
    }
}

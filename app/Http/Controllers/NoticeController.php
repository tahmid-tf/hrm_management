<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    // Show all notices (Admin/HR view)
    public function index()
    {
        $notices = Notice::latest()->paginate(10);
        return view('notices.index', compact('notices'));
    }

    // Show form to create a notice
    public function create()
    {
        return view('notices.create');
    }

    // Store new notice
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'visible_to_roles' => 'required|array',
            'status' => 'required|in:draft,published',
        ]);

        Notice::create([
            'title' => $request->title,
            'description' => $request->description,
            'visible_to_roles' => $request->visible_to_roles,
            'status' => $request->status,
            'published_by' => Auth::id(),
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    // Show single notice (admin/HR view)
    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    // Show form to edit notice
    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    // Update notice
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'visible_to_roles' => 'required|array',
            'status' => 'required|in:draft,published',
        ]);

        $notice->update([
            'title' => $request->title,
            'description' => $request->description,
            'visible_to_roles' => $request->visible_to_roles,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    // Delete notice
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }

    // Public view for all authenticated users
    public function publicIndex()
    {
        $userRole = Auth::user()->getRoleNames()->first(); // If using Spatie
        $notices = Notice::where('status', 'published')
            ->whereJsonContains('visible_to_roles', $userRole)
            ->latest()
            ->paginate(10);

        return view('notices.public', compact('notices'));
    }
}

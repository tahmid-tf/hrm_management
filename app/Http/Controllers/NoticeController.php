<?php

namespace App\Http\Controllers;

use App\Mail\NoticePublished;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NoticeController extends Controller
{
    // Show all notices (Admin/HR view)
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('panel.essential.notice.index', compact('notices'));
    }

    // Show form to create a notice
    public function create()
    {
        return view('panel.essential.notice.create');
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

        $notice = Notice::create([
            'title' => $request->title,
            'description' => $request->description,
            'visible_to_roles' => json_encode($request->visible_to_roles),
            'status' => $request->status,
            'published_by' => Auth::id(),
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        // Send mail only if notice is published
        if ($notice->status === 'published') {
            $roles = $request->visible_to_roles;

            // Get users with those roles
            $users = User::role($roles)->whereNotNull('email')->get();

            foreach ($users as $user) {
                Mail::to($user->email)->queue(new NoticePublished($notice));
            }
        }

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    public function show(Notice $notice)
    {
        return view('panel.essential.notice.show', compact('notice'));
    }

    // Show form to edit notice
    public function edit(Notice $notice)
    {
        return view('panel.essential.notice.edit', compact('notice'));
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


        return view('panel.essential.notice.public_notice', compact('notices'));
    }
}

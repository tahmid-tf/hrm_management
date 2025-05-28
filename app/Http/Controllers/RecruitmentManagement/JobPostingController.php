<?php

namespace App\Http\Controllers\RecruitmentManagement;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPostings = JobPosting::latest()->get();

        return view('panel.essential.recruitment.job_postings.index', compact('jobPostings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.essential.recruitment.job_postings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'department' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,contract',
            'location' => 'required|string|max:255',
            'status' => 'required|in:open,closed',
            'deadline' => 'required|date',
        ]);

        JobPosting::create($validated);
        return redirect()->route('job-postings.index')->with('success', 'Job posting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPosting $jobPosting)
    {



        return view('panel.essential.recruitment.job_postings.edit', compact('jobPosting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobPosting $jobPosting)
    {


        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'department' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,contract',
            'location' => 'required|string|max:255',
            'status' => 'required|in:open,closed',
            'deadline' => 'required|date',
        ]);

        $jobPosting->update($validated);
        return redirect()->route('job-postings.index')->with('success', 'Job posting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPosting $jobPosting)
    {
        $jobPosting->delete();
        return redirect()->route('job-postings.index')->with('success', 'Job post deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\RecruitmentManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Applicant::latest()->get();
        return view('panel.essential.recruitment.applicants.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobs = JobPosting::where('status', 'open')->get();
        return view('panel.essential.recruitment.applicants.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_posting_id' => 'required|exists:job_postings,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        Applicant::create([
            'job_posting_id' => $request->job_posting_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume' => $resumePath,
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        $applicant->load('jobPosting');
        return view('panel.essential.recruitment.applicants.show', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        if ($applicant->resume && Storage::disk('public')->exists($applicant->resume)) {
            Storage::disk('public')->delete($applicant->resume);
        }

        $applicant->delete();
        return redirect()->route('applicants.index')->with('success', 'Applicant deleted.');
    }
}

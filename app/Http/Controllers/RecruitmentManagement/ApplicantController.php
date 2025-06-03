<?php

namespace App\Http\Controllers\RecruitmentManagement;

use App\Exports\ApplicantsDataExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\JobPosting;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export()
    {
        return Excel::download(new ApplicantsDataExport(), 'applicants.xlsx');
    }

    public function clearAll()
    {
        Applicant::query()->delete();
        return redirect()->route('applicants.index')->with('success', 'All applicants cleared successfully.');
    }

//    ------------------------- apply API route -------------------------

    public function apply_for_jobs_api(Request $request)
    {
        $validated = $request->validate([
            'job_posting_id' => 'required|exists:job_postings,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Resume file is missing or invalid.',
            ], 422);
        }

        // ------------------ viewing if its active or not

        $job_postings = JobPosting::find($validated['job_posting_id']);

        if ($job_postings->status == 'closed') {
             return response()->json([
                 'success' => false,
                 'message' => 'Current job posting is closed.',
             ]);
        }

        Applicant::create([
            'job_posting_id' => $validated['job_posting_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'resume' => $resumePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully!',
        ], 201);
    }
}

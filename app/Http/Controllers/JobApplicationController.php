<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
// app/Http/Controllers/JobApplicationController.php
class JobApplicationController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:job_applications,email',
            'cover_letter' => 'required|string',
            'resume' => 'nullable|mimes:pdf|max:10240',  // max size 10MB
        ]);

        // Handle file upload if provided
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        } else {
            $resumePath = null;
        }

        // Store the job application in database
        JobApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'cover_letter' => $validated['cover_letter'],
            'resume' => $resumePath,
        ]);

        return redirect()->route('job.create')->with('success', 'Job application submitted successfully!');
    }
    public function viewapplicant()
    {
        return view('jobs.jobs-category.view-applicant');
    }

}

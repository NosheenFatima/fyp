<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class newJobController extends Controller
{
    public function create()
    {
        return view('jobs.jobs-category.job-form');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'company' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:50',
            'posted_at' => 'nullable|date_format:Y-m-d\TH:i',
        ]);

        // Create a new Job model instance or use Query Builder
        // $job = new Job();
        // $job->company = $request->input('company');
        // $job->job_title = $request->input('job_title');
        // $job->location = $request->input('location');
        // $job->salary = $request->input('salary');
        // $job->type = $request->input('type');
        // $job->posted_at = $request->input('posted_at');
        // $job->save();

        // Or using Query Builder:

        DB::table('jobs')->insert([
            'company' => $request->input('company'),
            'job_title' => $request->input('job_title'),
            'location' => $request->input('location'),
            'salary' => $request->input('salary'),
            'type' => $request->input('type'),
            'posted_at' => $request->input('posted_at'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    

        return redirect('/jobs')->with('success', 'Job added successfully!'); // Redirect to a listing page
    }
}

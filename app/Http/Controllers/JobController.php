<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class JobController extends Controller
{
    //
  // render the add categotry form
    public function showCategoryForm()
    {
        return view('jobs.jobs-category.job-category-add');
    }


    
    public function processJobCategoryForm(Request $request)
    {
        // Validation rules
        $rules = [
            'job-category' => 'required|string|max:255',
            'category_img' => 'required',
         
          
        ];

        $messages = [];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->route('forms.formshow')
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // Store validated data in variables
        $name = $request->input('job-category');
        $categoryPicture = $request->file('category_img');
    
        // File Uploading
     // File Uploading
    $categoryImgPath = null;
    if ($request->hasFile('category_img')) {
        $categoryPicture = $request->file('category_img');
        $filename = $categoryPicture->getClientOriginalName(); // Get the original filename
        $categoryImgPath = $categoryPicture->storeAs('job-categories', $filename, 'public');
        // storeAs() allows you to specify the filename
    }
    //   echo ($name);
    //   echo ($categoryImgPath);

         // Use Laravel's Query Builder to insert the data
         DB::table('job_category')->insert([
       
            'category_image' => $categoryImgPath, 
            'job_title' => $name, 
        
        ]);

    // Optionally, you can return a response to indicate success
    return redirect()->back()->with('success', 'Job category added successfully!');

    }


    public function showCategoryList()
    {
        $jobCategories = DB::table('job_category')->orderBy('id', 'desc')->get();
        return view('jobs.jobs-category.job-category-list', compact('jobCategories'));
    }

    // Delete Category
    public function deleteJobCategory($id)
    {
        $category = DB::table('job_category')->find($id);

        // if (!$category) {
        //     return redirect()->route('jobs.category.list')->with('error', 'Category not found.');
        // }

        // Delete the associated image if it exists
        if ($category->category_image && \Storage::disk('public')->exists($category->category_image)) {
            \Storage::disk('public')->delete($category->category_image);
        }

        DB::table('job_category')->where('id', $id)->delete();

        // return redirect()->route('jobs.category.list')->with('success', 'Job category deleted successfully!');
    }

// for new add job

public function showForm()
{
    return view('jobs.jobs-category.job-form'); // Assuming your form is in resources/views/new-job-form.blade.php
}

public function insertJob(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'company_logo' => 'nullable',
        'company' => 'required|string|max:255',
        'job_title' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'salary' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:50',
       'posted_at' => 'nullable|date_format:Y-m-d\TH:i|before_or_equal:+10 years',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $postedAtInput = $request->input('posted_at');
    $postedAt = null;

    if ($postedAtInput) {
        $postedAt = Carbon::parse($postedAtInput);
    } else {
        $postedAt = Carbon::now(); // Use current time if the input is blank
    }
    $companyLogoPath = null;

    // Handle company logo upload
    if ($request->hasFile('company_logo')) {
        $categoryPicture = $request->file('company_logo');
        $filename = $categoryPicture->getClientOriginalName();
        $companyLogoPath = $request->file('company_logo')->store('company-logos', 'public');
    }

    // Insert data into the 'new_job_table'
    DB::table('new_job')->insert([
        'company_logo' => $companyLogoPath,
        'company' => $request->input('company'),
        'job_title' => $request->input('job_title'),
        'location' => $request->input('location'),
        'salary' => $request->input('salary'),
        'type' => $request->input('type'),
        'posted_at' => $postedAt,
  
    ]);

    return redirect()->back()->with('success', 'new job added successfully!');
}

public function showJob()
{
    $jobCategories = DB::table('new_job')->orderBy('id', 'desc')->get();
    return view('jobs.jobs-category.view-job');
}
public function destroy($id)
{
    $job = DB::table('new_job')->find($id);

    if (!$job) {
        return redirect()->route('job-list')->with('error', 'Job not found.');
    }

    // Check if a company logo exists
    if ($job->company_logo) {
        // Construct the path to the image (assuming it's stored in the 'public' disk)
        $imagePath = 'public/' . $job->company_logo;

        // Delete the image file if it exists
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    }

    // Delete the job record from the database
    $deleted = DB::table('new_job')->where('id', $id)->delete();

    if ($deleted) {
        return redirect()->route('All-Jobs')->with('success', 'Job deleted successfully!');
    } else {
        return redirect()->route('All-Jobs')->with('error', 'Failed to delete job.');
    }

    // You should always return a response (redirect in this case)
    return redirect()->route('All-Jobs')->with('info', 'Deletion process completed.'); // Fallback redirect
}
public function show($id)
{
    // Using Query Builder
    $job = DB::table('new_job')->find($id);

    // Or using Eloquent Model (if you have one)
    // $job = NewJob::findOrFail($id); // findOrFail will automatically return a 404 if the job doesn't exist

    if (!$job) {
        abort(404); // Handle the case where the job doesn't exist
    }

    return view('jobdetails', compact('job')); // Create a 'jobs/details.blade.php' view
}
}

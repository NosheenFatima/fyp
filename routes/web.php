<?php
use App\Http\Controllers\Admin\ContactAdminController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/index');
});
Route::get('/index', function () {
    return view('index'); // This would now render a different index.blade.php
});
Route::get('about/', function () {
    return view('about');
});
Route::get('findjob/', function () {
    return view('findjob');
});
Route::get('jobdetails/', function () {
    return view('jobdetails');
});
Route::get('contact/', function () {
    return view('contact');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // ROUTES FOR ADMIN
    Route::middleware(['role:admin'])->group(function () {
     
    
        Route::get('/job-category',[JobController::class,'showCategoryForm'])->name('show-category-form');

        Route::post('/job-category',[JobController::class,'processJobCategoryForm'])->name('add-category-form');
        Route::get('/all-job-category',[JobController::class,'showCategoryList'])->name('all-categories');
        Route::delete('/delete-job-category/{id}', [JobController::class, 'deleteJobCategory'])->name('jobs.category.delete');
        
    Route::get('/job-form-veiew',[JobController::class,'showForm'])->name('show-new-job');
    Route::post('/job-form-veiew',[JobController::class,'insertJob'])->name('add-new-job');
    Route::get('/view-jobs',[JobController::class,'showJob'])->name('All-Jobs');
    Route::delete('/delete-job/{id}', [JobController::class, 'destroy'])->name('jobs-delete');

    // Route::post('/contact-process', [ContactController::class, 'store'])->name('contact.store');
    // Route::get('/admin/contact', [ContactAdminController::class, 'index'])->name('admin.contacts.index');
    Route::get('/job/{id}', [JobController::class, 'showJobDetails'])->name('jobs.show');

});
    
    

    Route::get('/job-application', [JobApplicationController::class, 'create'])->name('job.create');
    Route::post('/job-application', [JobApplicationController::class, 'store'])->name('job.store');
    Route::get('/view-applicant', [JobApplicationController::class, 'viewapplicant'])->name('view-user');

});

require __DIR__.'/auth.php';

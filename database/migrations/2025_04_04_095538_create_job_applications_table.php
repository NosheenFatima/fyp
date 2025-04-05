<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Creating the job_applications table with necessary columns
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('cover_letter')->nullable(); // Optional cover letter
            $table->string('resume'); // File path for the resume
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the job_applications table if we rollback the migration
        Schema::dropIfExists('job_applications');
    }
};

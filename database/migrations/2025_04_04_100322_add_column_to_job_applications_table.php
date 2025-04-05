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
        Schema::table('job_applications', function (Blueprint $table) {
            // Adding new columns
            $table->string('name');
            $table->string('email');
            $table->text('cover_letter')->nullable();  // Nullable, in case the user doesn't provide one
            $table->string('resume');  // Store the file path to the uploaded resume
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Dropping the columns that were added
            $table->dropColumn(['name', 'email', 'cover_letter', 'resume']);
        });
    }
};

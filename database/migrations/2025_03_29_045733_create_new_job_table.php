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
        Schema::create('new_job', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('company');
            $table->string('job_title');
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_job');
    }
};

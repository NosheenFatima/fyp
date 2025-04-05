<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    // Disable automatic timestamps (created_at and updated_at)
    public $timestamps = false;

    // Define the fillable columns
    protected $fillable = ['name', 'email', 'cover_letter', 'resume'];
}

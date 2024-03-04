<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'mobile',
        'role',
        'file',
        'address','workExperience','education',
        // Add more fillable properties as needed
    ];
    protected $table = 'job_applications';

    protected $guarded = [];

    // Define relationships or additional methods here if needed
}

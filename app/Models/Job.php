<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'actuation_field',
        'locale','job_type',
        'is_remote','description'
    ];

    protected $table = 'jobs';
}
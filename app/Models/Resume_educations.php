<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume_educations extends Model
{
    protected $fillable = ['summary', 'course_name', 'passing_year', 'institute_name', 'gpa'];
}

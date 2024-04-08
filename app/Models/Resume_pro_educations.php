<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume_pro_educations extends Model
{
    protected $fillable = ['course_name', 'passing_year', 'institute_name', 'mentor_name1', 'mentor_name2'];
}

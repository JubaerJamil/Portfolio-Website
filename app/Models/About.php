<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['about_info', 'about_title', 'about_details', 'birthday', 'phone_number', 'current_city_name', 'email', 'freelancer',
                            'birth_place', 'img_url', 'user_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = ['main_content', 'title_content', 'content_details', 'user_id'];
}

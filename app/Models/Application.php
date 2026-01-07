<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Application extends Model
{
   protected $fillable = ['company_name', 'job_title', 'status', 'applied_at', 'link', 'user_id'];
}

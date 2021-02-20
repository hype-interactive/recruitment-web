<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class,"job_category_id","id");
    }
}

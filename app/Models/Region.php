<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class,"region_id","id");
    }
}

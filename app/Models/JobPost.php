<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'deadline',
        'type',
        'description',
        'job_category_id',
        'region_id',
    ];


    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, "job_category_id","id");
    }

    public function region()
    {
        return $this->belongsTo(Region::class, "region_id","id");
    }

    public function applications()
    {
        return $this->hasMany(Application::class,"job_post_id","id");
    }
}

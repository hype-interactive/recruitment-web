<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class,"job_post_id","id");
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function applicationDocument()
    {
        return $this->belongsTo(ApplicationDocument::class,"application_document_id","id");
    }
}

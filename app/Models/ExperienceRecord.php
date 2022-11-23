<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'profession_name',
        'start_date',
        'end_date',
        'user_id',
    ];
}

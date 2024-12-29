<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'myjobs';
	
	protected $fillable = [
        'title',
        'description',
        'company_name',
        'company_logo',
        'experience',
        'salary',
        'location',
        'skills',
        'extra',   
    ];

   protected $casts = [
        'skills' => 'array',
        'extra' => 'array',
    ];
}

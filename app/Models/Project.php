<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'status',
        'title',
        'place',
        'description',
        'image',
        'category',
        'duration'
    ];
}

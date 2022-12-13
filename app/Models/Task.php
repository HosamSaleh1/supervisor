<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_id',
        'user_id',
        'completed',
    ];

    /*
    * casts the completed attribute to a boolean
    */
    
    protected $casts = [
        'completed' => 'boolean',
    ];
    
}

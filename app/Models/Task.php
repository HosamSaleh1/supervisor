<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
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

    /*
    * returns the project associated with the task
    */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /*
    * returns the user associated with the task
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

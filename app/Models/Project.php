<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /*
    * fillable attributes
    */

    protected $fillable = [
        'name',
        'description',
        'admin_id',
        'completed'
    ];

    /*
    * casts the completed attribute to a boolean
    */
    protected $casts = [
        'completed' => 'boolean',
    ];

    /*
    * returns the tasks associated with the project
    */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /*
    * the admin created the project
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

}

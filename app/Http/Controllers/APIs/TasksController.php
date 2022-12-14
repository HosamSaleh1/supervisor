<?php

namespace App\Http\Controllers\APIs;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Fully-qualified model class name
     */

    protected $model = Task::class;
}

<?php

namespace App\Http\Controllers\APIs;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller
{
    /**
     * Fully-qualified model class name
     */

    protected $model = Project::class;
}

<?php

namespace App\Http\Controllers\APIs;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Project;
use Orion\Concerns\DisableAuthorization;

class ProjectsController extends Controller
{
    use DisableAuthorization;
    /**
     * Fully-qualified model class name
     */

    protected $model = Project::class;

}

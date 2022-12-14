<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::select('id','name','description')->where('user_id', auth()->user()->id)->where('completed', 0)->get();
        return view('home', ['tasks' => $tasks]);
    }

    public function submit($id)
    {
        $task = Task::where('id',$id)->update(['completed' => 1]);
        return back()->with('success', 'Task completed successfully');
    }
}

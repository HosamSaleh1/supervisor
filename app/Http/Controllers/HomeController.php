<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $tasks = Task::where('user_id', auth()->user()->id)->where('completed', 0)->get();
            $tasks = DB::select("SELECT
            `id` AS ID,
            `name` AS Name,
            `description` AS Description
        FROM
            `tasks`
        WHERE
            user_id = " . auth()->user()->id . " AND completed = 0");
        return view('home', ['tasks' => $tasks]);
    }

    public function submit(Request $request, $id)
    {
        $task = Task::where('id',$id)->update([
            'completed' => 1,
            'description' => $request->description
        ]);
        return back()->with('success', 'Task completed successfully');
    }
}

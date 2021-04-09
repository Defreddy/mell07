<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
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
     * Add new task and show them
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        $task = new Task;
        $task->user_id = Auth::id();
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Show all tasks
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tasks', [ 'tasks' => Auth::user()->tasks ]);
    }

    /**
     * Move task to the next stage
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function move_task(int $task_id)
    {
        $task = Task::findOrFail($task_id);
        if ($task->user_id == Auth::id()) {
            if ($task->status == 'todo') $task->status = 'doing';
            elseif ($task->status == 'doing') $task->status = 'done';
            $task->save();    
        }
        return redirect('/tasks');
    }

    /**
     * Move task to the next stage
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete_task(int $task_id)
    {
        $task = Task::findOrFail($task_id);
        if ($task->user_id == Auth::id()) {
            $task->delete();    
        }
        return redirect('/tasks');
    }

}

<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'newTask' => "required|min:2"
        ]);

        $store_task = new Task();

        $store_task->user_id = auth()->user()->id;
        $store_task->name = $request->input("newTask");

        $store_task->save();

        return redirect("/tasks");
    }

    public function edit($taskID)
    {
        $taskEdit = Task::find($taskID);

        return view("modify", compact("taskEdit"));
    }

    public function update(Request $request, $taskID)
    {
        $request->validate([
            'updateTask' => "required|min:2"
        ]);

        $taskUpdate = Task::find($taskID);

        $taskUpdate->user_id = auth()->user()->id;
        $taskUpdate->name = $request->input("updateTask");

        $taskUpdate->save();

        return redirect("/tasks");
    }

    public function delete($taskID)
    {
        $task = Task::find($taskID);

        $task->delete();

        return redirect("/tasks");
    }
}

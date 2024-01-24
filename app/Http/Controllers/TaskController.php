<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks
        ], 200);
    }
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);
        return response()->json([
            'task' => $task
        ], 201);
    }
    public function show(Task $task)
    {
        if (!$task) {
            return response()->json([
                'message' => 'Task not found'
            ], 404);
        }
        return response()->json([
            'task' => $task
        ], 200);
    }
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        return response()->json([
            'task' => $task
        ], 201);
    }
    public function destroy(Task $task)
    {
        if (!$task) {
            return response()->json([
                'message' => 'Task not found'
            ], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Successfully'], 200);
    }
    public function updateStatus(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task){
            return response()->json([
                'message' => 'Task not found'
            ], 404);
        }
        if ($request->status > 3){
            return response()->json([
                'message' => 'Undefined status'
            ], 422);
        }
        $task->status = $request->status;
        $task->save();
        return response()->json([
            'task' => $task
        ], 201);
    }
}

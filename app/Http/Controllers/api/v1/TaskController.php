<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Http\Resources\taskResourec;
use App\Models\task;
use Illuminate\Routing\Controller;


/**
 * Summary of TaskController
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return taskResourec::collection(Task::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretaskRequest $request)
    {
       $task=task::create($request->validated());
       return taskResourec::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        return taskResourec::make($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
         $task= $task->update($request->validated());
          return taskResourec::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}

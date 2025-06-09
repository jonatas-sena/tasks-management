<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    protected TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function index(): Response
    {
        $tasks = $this->service->list();

        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task): Response
    {
        return Inertia::render('Tasks/Edit', [
            'task' => $task,
        ]);
    }

    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        $this->service->update($task, $request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->service->destroy($task);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

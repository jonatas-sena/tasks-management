<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    public function allForUser()
    {
        return Task::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();
    }

    public function find($id)
    {
        return Task::where('user_id', Auth::id())->findOrFail($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();
        return Task::create($data);
    }

    public function update(Task $task, array $data)
    {
        return $task->update($data);
    }

    public function delete(Task $task)
    {
        return $task->delete();
    }
}

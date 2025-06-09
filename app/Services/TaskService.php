<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService
{
    protected TaskRepository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return $this->repository->allForUser();
    }

    public function store(array $data): Task
    {
        return $this->repository->create($data);
    }

    public function update(Task $task, array $data): bool
    {
        return $this->repository->update($task, $data);
    }

    public function destroy(Task $task): bool
    {
        return $this->repository->delete($task);
    }

    public function find(int $id): Task
    {
        return $this->repository->find($id);
    }
}

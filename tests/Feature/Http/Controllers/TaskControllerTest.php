<?php
it('can create a task', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user)
        ->post('/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'status' => 'pending',
            'priority' => 'medium',
            'due_date' => now()->addDay()->format('Y-m-d'),
        ])
        ->assertRedirect('/tasks');

    $this->assertDatabaseHas('tasks', [
        'title' => 'Test Task',
        'user_id' => $user->id,
    ]);
});

it('validates required fields', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user)
        ->post('/tasks', [])
        ->assertSessionHasErrors(['title', 'status', 'priority']);
});

it('attaches task to authenticated user', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user)
        ->post('/tasks', [
            'title' => 'My Task',
            'description' => '...',
            'status' => 'done',
            'priority' => 'high',
            'due_date' => now()->addDay()->format('Y-m-d'),
        ]);

    $this->assertDatabaseHas('tasks', [
        'title' => 'My Task',
        'user_id' => $user->id,
    ]);
});

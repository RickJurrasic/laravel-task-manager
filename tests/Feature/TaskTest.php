<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_view_task_index(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'title' => 'Test Task',
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/tasks');

        $response->assertStatus(200);
        $response->assertSee('Test Task');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_create_task(): void
    {
        $user = User::factory()->create();

        $taskData = [
            'title' => 'New Task',
            'description' => 'Task description longer than 10 chars',
            'status' => 'todo',
        ];

        $response = $this->actingAs($user)->post('/tasks', $taskData);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
            'user_id' => $user->id,
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_update_task(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);

        $updatedData = [
            'title' => 'Updated Title',
            'description' => $task->description,
            'status' => $task->status,
        ];

        $response = $this->actingAs($user)->put("/tasks/{$task->id}", $updatedData);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Title',
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function user_can_delete_task(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete("/tasks/{$task->id}");

        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function task_creation_requires_valid_data(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/tasks', [
            'title' => '',
            'description' => 'short',
            'status' => 'invalid_status',
        ]);

        $response->assertSessionHasErrors(['title', 'description', 'status']);
    }
}

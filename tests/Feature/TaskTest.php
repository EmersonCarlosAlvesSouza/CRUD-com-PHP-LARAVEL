<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    public function user_can_create_a_task()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/tasks', [
            'title' => 'Nova Tarefa Teste',
            'description' => 'Descrição da tarefa de teste',
            'status' => 'Pendente',
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', [
            'title' => 'Nova Tarefa Teste',
            'description' => 'Descrição da tarefa de teste',
            'status' => 'Pendente',
            'user_id' => $user->id,
        ]);
    }
}

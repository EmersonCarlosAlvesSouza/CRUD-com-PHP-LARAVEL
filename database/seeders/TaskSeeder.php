<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $userId = 1; // ID do usuario que foi criado no UserSeeder

        Task::create([
            'user_id' => $userId,
            'title' => 'Estudar Laravel',
            'description' => 'Terminar o desafio de estágio',
            'status' => 'Pendente',
        ]);

        Task::create([
            'user_id' => $userId,
            'title' => 'Fazer README',
            'description' => 'Criar o arquivo de instruções do projeto',
            'status' => 'Pendente',
        ]);

        Task::create([
            'user_id' => $userId,
            'title' => 'Enviar projeto para avaliação',
            'description' => 'Enviar o link do repositório',
            'status' => 'Concluída',
        ]);
    }
}

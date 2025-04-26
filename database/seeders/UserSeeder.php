<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Usuário Teste',
            'email' => 'teste@example.com',
            'password' => Hash::make('password'), // senha é "password"
        ]);
    }
}

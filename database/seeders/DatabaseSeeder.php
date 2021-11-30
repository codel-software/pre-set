<?php

namespace Database\Seeders;

use App\Core\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "teste",
            "email" => "teste@teste.com",
            "password" => Hash::make('12345678')
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

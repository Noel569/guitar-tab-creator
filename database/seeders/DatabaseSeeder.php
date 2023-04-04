<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tab;
use App\Models\Tuning;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tuning::create(['name'=>'Standard', 'tuning'=>'']);
        User::create(['username'=>'User01', 'email'=>'proguitarist@gmail.com', 'password'=>Hash::make("asd123")]);
        Tab::factory(10)->count(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

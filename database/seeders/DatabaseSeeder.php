<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Like;
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
        $tuning = Tuning::create(['name'=>'Standard', 'tuning'=>'']);
        //$user = User::create(['username'=>'User01', 'email'=>'proguitarist@gmail.com', 'password'=>Hash::make("asd123")]);
        //$tabs = Tab::factory()->count(10)->create(['tuning_id'=>$tuning->id]);

        /*foreach ($tabs as $tab) {
            Like::factory()->count(rand(1, 10))->create(['user_id'=>$user->id, 'tab_id'=>$tab->id]);
            Comment::factory()->count(rand(1, 10))->create(['user_id'=>$user->id, 'tab_id'=>$tab->id]);
        }*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

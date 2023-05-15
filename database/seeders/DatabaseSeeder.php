<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Chord;
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
        Tuning::create(['name'=>'Drop D', 'tuning'=>'[-7, 0, 5, 10, 14, 19]']);
        Tuning::create(['name'=>'D Tuning', 'tuning'=>'[-7, -2, 3, 8, 12, 17]']);
        /*
        $c = Chord::create(['name'=>'C', 'chord'=>'[null, 3, 2, 0, 1, 0]']);
        $d = Chord::create(['name'=>'D', 'chord'=>'[null, null, 0, 2, 3, 2]']);
        $e = Chord::create(['name'=>'E', 'chord'=>'[0, 2, 2, 1, 0, 0]']);
        $f = Chord::create(['name'=>'F', 'chord'=>'[null, 3, 3, 2, 1, 1]']);
        $g = Chord::create(['name'=>'G', 'chord'=>'[3, 2, 0, 0, 3, 3]']);
        $a = Chord::create(['name'=>'A', 'chord'=>'[null, 0, 2, 2, 2, 0]']);
        $b = Chord::create(['name'=>'B', 'chord'=>'[null, 2, 4, 4, 4, 2]']);

        $tuning = Tuning::create(['name'=>'Standard', 'tuning'=>'']);
        $user = User::create(['username'=>'User01', 'email'=>'proguitarist@gmail.com', 'password'=>Hash::make("asd123")]);
        $tabs = Tab::factory()->count(10)->create(['tuning_id'=>$tuning->id]);

        foreach ($tabs as $tab) {
            Like::factory()->count(rand(1, 10))->create(['user_id'=>$user->id, 'tab_id'=>$tab->id]);
            Comment::factory()->count(rand(1, 10))->create(['user_id'=>$user->id, 'tab_id'=>$tab->id]);
        }*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

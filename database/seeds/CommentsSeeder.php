<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
            factory(\App\Comment::class, 21)->create([
                'user_id' => $user->id
            ]);
        });
    }
}

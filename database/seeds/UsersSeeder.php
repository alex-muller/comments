<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'photo' => '5.jpg'
        ]);
        factory(\App\User::class, 4)->create();
    }
}

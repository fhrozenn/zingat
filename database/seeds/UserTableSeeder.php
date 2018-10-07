<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->password = \Illuminate\Support\Facades\Hash::make('123');
        $user->email = 'jhon_doe@doe.com';
        $user->save();
    }
}

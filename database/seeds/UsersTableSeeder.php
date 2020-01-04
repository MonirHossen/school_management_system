<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mizanul Rahman',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'gender' => 'male',
            'password' => bcrypt('123456'),
        ]);
    }
}

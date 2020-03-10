<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'AIR ALPHA',
            'email' => 'allphaair@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'EMMA PENGOU',
            'email' => 'pengou@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'customer',
        ]);

        User::create([
            'name' => 'ULRICH LAMBO',
            'email' => 'lambo@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'producer',
        ]);
    }
}

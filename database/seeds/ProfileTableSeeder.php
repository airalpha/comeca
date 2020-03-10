<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'city' => 'Douala',
            'bio' => 'Un grand dev',
            'phone' => '+237697456833',
            'avatar' => 'uploads/profile/avatar.png',
            'user_id' => 1
        ]);

        Profile::create([
            'city' => 'Bandjoun',
            'bio' => 'Un bon gar',
            'phone' => '+237657278421',
            'avatar' => 'uploads/profile/avatar.png',
            'user_id' => 2
        ]);

        Profile::create([
            'city' => 'Bandjoun',
            'bio' => 'Un bon gar',
            'phone' => '+237693589778',
            'avatar' => 'uploads/profile/avatar.png',
            'user_id' => 3
        ]);
    }
}

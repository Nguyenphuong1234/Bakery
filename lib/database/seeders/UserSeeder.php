<?php

namespace Database\Seeders;

use App\Models\VpUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VpUser::insert(
            [
                'email'=> 'manhdung@gmail.com',
                'password'=> bcrypt('123456'),
                'level'=> 1
            ]

        );
    }
}

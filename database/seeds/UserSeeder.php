<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Roberto Sierra',
            'email'  => 'roberto30589@gmail.com',
            'password'  => bcrypt('3353089ro'),
        ]);
    }
}

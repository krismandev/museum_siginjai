<?php

use App\User;
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
        User::create([
            "name"=>"Krisman",
            "email"=>"krismanpratama@gmail.com",
            "password"=>bcrypt("zzzzzzzz")
        ]);
    }
}

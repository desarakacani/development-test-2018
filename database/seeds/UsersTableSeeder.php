<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'firstname'      => 'admin',
            'lastname'       => 'admin',
            'email'          => 'admin@admin.com',
            'password'       =>  bcrypt('test1234'),
            'contact_number' =>  '+35568686868',
        ]);
    }
}

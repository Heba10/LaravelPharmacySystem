<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //we truncate the table first as every time call this method not to repeat the data 
        Role::truncate();

        //here we create Role for admin
        Role::create(['name' => 'admin']);

        //here we create Role for pharnacy
        Role::create(['name' => 'pharmacy']);

        //here we create Role for doctor
        Role::create(['name' => 'doctor']);

        //here we create Role for normal user
        Role::create(['name' => 'user']);

    }
}

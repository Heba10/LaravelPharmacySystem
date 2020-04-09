<?php

use Illuminate\Database\Seeder;

// use App\Role;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //empty the table before fill the table with data and avoid dublicate data
        // Role::truncate();

        //make role for admin
        // Role::create(['name' => 'admin']);
        // //make role for pharmacy
        // Role::create(['name' => 'pharmacy']);
        // //make role for doctor
        // Role::create(['name' => 'doctor']);

        // Role::create(['guard_name' => 'admin', 'name' => 'manager']);

    }
}

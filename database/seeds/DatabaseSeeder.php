<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(AdminTableSeeder::class);

        $this->call(PharmacySeeder::class);

        $this->call(DoctorTableSeeder::class);

        $this->call(AreaTableSeeder::class);

        $this->call(PermissionsDemoSeeder::class);

        
    }
}

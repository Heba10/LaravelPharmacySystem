
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Admin;
use App\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::truncate();

        $admin = Admin::create([
                'name'      => 'admin',
                'email'     => 'admin@admin.com',
                'password'  => Hash::make('123456'),
        ]);

    }
}
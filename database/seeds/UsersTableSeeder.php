<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //empty data from the table User
        User::truncate();

        //empty data from the table role_user
        // DB::table('role_user')->truncate();


        // $adminRole = Role::where('name', 'admin')->first();

        // $pharmacyRole = Role::where('name', 'pharmacy')->first();

        // $doctorRole = Role::where('name', 'doctor')->first();


        $admin = User::create([
            'name'      => 'admin',
            'email'     => 'admin@admn.com',
            'password'  => Hash::make('123456'),
            'password_confirmation' => Hash::make('123456'),
            'gender'    => 'Male',
            'date_of_birth' => '1993-10-17',
            'image'     => 'admin.jpg',
            'mobile_number' => '12345678',
            'national_id'   => '12345678',
            'last_login_date' => '3'
        ]);

        $pharmacy = User::create([
            'name'      => 'pharmacy',
            'email'     => 'pharmacy@pharmacy.com',
            'password'  => Hash::make('123456'),
            'password_confirmation' => Hash::make('123456'),
            'gender'    => 'Male',
            'date_of_birth' => '1993-10-17',
            'image'     => 'pharmacy.jpg',
            'mobile_number' => '12345678',
            'national_id'   => '12345678',
            'last_login_date' => '3'
        ]);

        $doctor = User::create([

            'name'            => 'doctor',
            'email'           => 'doctor@doctor.com',
            'password'        => Hash::make('123456'),
            'password_confirmation' => Hash::make('123456'),
            'gender'          => 'Male',
            'date_of_birth'   => '1993-10-17',
            'image'           => 'doctor.jpg',
            'mobile_number'   => '12345678',
            'national_id'     => '12345678',
            'last_login_date' => '3'

        ]);

        //assign admin to adminRole
        // $admin->roles()->attach($adminRole);

        //assign pharmacy to pharmacyRole
        // $pharmacy->roles()->attach($pharmacyRole);

        //assign doctor to doctorRole
        // $doctor->roles()->attach($doctorRole);

    }
}

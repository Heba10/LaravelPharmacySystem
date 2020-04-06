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
        //to truncate user table before enter data
        User::truncate();

        //to truncate role_user table before enter data as it has relation with user table
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $pharmacyRole = Role::where('name', 'pharmacy')->first();
        $doctorRole = Role::where('name', 'doctor')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('123456'),
            'gender'    => 'Male',
            'password_confirmation' =>  Hash::make('123456'),
            'date_of_birth'     => now(),
            'image'     => 'admin.jpg',
            'mobile_number' => '123456',
            'national_id'   => '123456'
        ]);
        $pharmacy = User::create([
            'name'      => 'pharmacy',
            'email'     => 'pharmacy@pharmacy.com',
            'password'  => Hash::make('123456'),
            'gender'    => 'Male',
            'password_confirmation' =>  Hash::make('123456'),
            'date_of_birth'     => now(),
            'image'     => 'pharmacy.jpg',
            'mobile_number' => '123456',
            'national_id'   => '123456'

        ]);
        $doctor = User::create([
            'name'      => 'doctor',
            'email'     => 'doctor@doctor.com',
            'password'  => Hash::make('123456'),
            'gender'    => 'Male',
            'password_confirmation' =>  Hash::make('123456'),
            'date_of_birth'     => now(),
            'image'     => 'doctor.jpg',
            'mobile_number' => '123456',
            'national_id'   => '123456'
        ]);
        $user = User::create([
            'name'      => 'Normal User',
            'email'     => 'user@user.com',
            'password'  => Hash::make('123456'),
            'gender'    => 'Male',
            'password_confirmation' =>  Hash::make('123456'),
            'date_of_birth'     => now(),
            'image'     => 'user.jpg',
            'mobile_number' => '123456',
            'national_id'   => '123456'
        ]);

        $admin->roles()->attach($adminRole);
        $pharmacy->roles()->attach($pharmacyRole);
        $doctor->roles()->attach($doctorRole);
        $user->roles()->attach($userRole);
    }
}

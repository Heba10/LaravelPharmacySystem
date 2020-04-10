
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Doctor;
use App\Role;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Doctor::truncate();

        $doctor = Doctor::create([
                'name'        => 'doctor',
                'email'       => 'doctor@doctor.com',
                'password'    => Hash::make('123456'),
                'image'       => '20200407011900.png',
                'is_banned'   => false,
                'pharmacy_id' => 1,
                'national_id' => '12345678'
        ]);

    }
}
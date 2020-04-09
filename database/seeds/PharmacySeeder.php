<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Pharmacy;


class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pharmacy::truncate();

        Pharmacy::create([
            'name'        => 'pharmacy',
            'email'       => 'pharmacy@pharmacy.com',
            'password'    => Hash::make('123456'),
            'image'       => '20200407011900.png',
            'national_id' => '12345678',
            'area_id'     => 1,
            'priority'    => 1
        ]);
    }
}


<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Area;
use App\Role;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Area::truncate();

        $admin = Area::create([
                'name'      => 'Alex',
                'address'     => 'M7atet Elraml',
        ]);

    }
}
<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        
        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => 'admin','name' => 'admin']);
        $role2 = Role::create(['guard_name' => 'pharmacy','name' => 'pharmacy owner']);
        $role3 = Role::create(['guard_name' => 'doctor','name' => 'doctor']);
        
        // create permissions
        Permission::create(['guard_name' => 'admin','name' => 'crud pharmacy']);
        Permission::create(['guard_name' => 'admin','name' => 'crud doctor']);
        Permission::create(['guard_name' => 'admin','name' => 'crud order']);

        Permission::create(['guard_name' => 'pharmacy','name' => 'crud doctor']);
        Permission::create(['guard_name' => 'pharmacy','name' => 'crud order']);

        Permission::create(['guard_name' => 'doctor','name' => 'crud order']);
        //admin
        $role1->givePermissionTo('crud pharmacy');
        $role1->givePermissionTo('crud doctor');
        $role1->givePermissionTo('crud order');

        //pharmacy
        $role2->givePermissionTo('crud doctor');
        $role2->givePermissionTo('crud order');

        //doctor
        $role3->givePermissionTo('crud order');



    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create([
            'name' => 'control engine'
        ]);

        Permission::create([
            'name' => 'view kendaraan all'
        ]);

        Permission::create([
            'name' => 'view kendaraan sewa'
        ]);

        Permission::create([
            'name' => 'view kendaraan dimiliki'
        ]);



        //===== Give Permission =====

        $role = Role::findByName('superadmin');                  //super admin
        $role->givePermissionTo(Permission::all());

        $role = Role::findByName('admin');                  //admin
        $role->givePermissionTo('view kendaraan dimiliki', 'control engine');

        $role = Role::findByName('user');                  //user
        $role->givePermissionTo('view kendaraan sewa');

        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'show motel']);
        Permission::create(['name' => 'create motel']);
        Permission::create(['name' => 'edit motel']);
        Permission::create(['name' => 'delete motel']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'show user']);

        Permission::create(['name' => 'create guest type']);
        Permission::create(['name' => 'edit guest type']);
        Permission::create(['name' => 'delete guest type']);
        Permission::create(['name' => 'show guest type']);

        Permission::create(['name' => 'create guest']);
        Permission::create(['name' => 'edit guest']);
        Permission::create(['name' => 'delete guest']);
        Permission::create(['name' => 'show guest']);

        Permission::create(['name' => 'create room']);
        Permission::create(['name' => 'edit room']);
        Permission::create(['name' => 'delete room']);
        Permission::create(['name' => 'show room']);

        Permission::create(['name' => 'create room type']);
        Permission::create(['name' => 'edit room type']);
        Permission::create(['name' => 'delete room type']);
        Permission::create(['name' => 'show room type']);

        Permission::create(['name' => 'create rates']);
        Permission::create(['name' => 'edit rates']);
        Permission::create(['name' => 'delete rates']);
        Permission::create(['name' => 'show rates']);

        Permission::create(['name' => 'check in guest']);
        Permission::create(['name' => 'check out guest']);

        Permission::create(['name' => 'create motel admin user']);
        Permission::create(['name' => 'edit motel admin user']);
        Permission::create(['name' => 'delete motel admin user']);
        Permission::create(['name' => 'show motel admin user']);

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'Super admin']);
        $adminRole->givePermissionTo(Permission::all());

        $motelAdmin = Role::create(['name' => 'Motel Admin']);
        $motelAdmin->givePermissionTo([
            'create guest', 
            'edit guest', 
            'delete guest', 
            'show guest',
            'check in guest',
            'check out guest',
            'create rates',
            'edit rates',
            'delete rates',
            'show rates',
            'create room',
            'edit room',
            'delete room',
            'show room',
            'create room type',
            'edit room type',
            'delete room type',
            'show room type',
            'create guest type',
            'edit guest type',
            'delete guest type',
            'show guest type',
            'create user',
            'edit user',
            'delete user',
            'show user',
        ]);
    }
}

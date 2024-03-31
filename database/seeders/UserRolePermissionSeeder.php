<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create Permissions
         Permission::create(['name' => 'view role']);
         Permission::create(['name' => 'create role']);
         Permission::create(['name' => 'update role']);
         Permission::create(['name' => 'delete role']);
 
         Permission::create(['name' => 'view permission']);
         Permission::create(['name' => 'create permission']);
         Permission::create(['name' => 'update permission']);
         Permission::create(['name' => 'delete permission']);
 
         Permission::create(['name' => 'view user']);
         Permission::create(['name' => 'create user']);
         Permission::create(['name' => 'update user']);
         Permission::create(['name' => 'delete user']);
 
         Permission::create(['name' => 'view mazao']);
         Permission::create(['name' => 'create mazao']);
         Permission::create(['name' => 'update mazao']);
         Permission::create(['name' => 'delete mazao']);

         Permission::create(['name' => 'view pembejeo']);
         Permission::create(['name' => 'create pembejeo']);
         Permission::create(['name' => 'update pembejeo']);
         Permission::create(['name' => 'delete pembejeo']);

         Permission::create(['name' => 'view beizamazao']);
         Permission::create(['name' => 'create beizamazao']);
         Permission::create(['name' => 'update beizamazao']);
         Permission::create(['name' => 'delete beizamazao']);
 
 
         // Create Roles
         $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
         $adminRole = Role::create(['name' => 'admin']);
         $mkulimaRole = Role::create(['name' => 'mkulima']);
         $userRole = Role::create(['name' => 'user']);
 
         // Lets give all permission to super-admin role.
         $allPermissionNames = Permission::pluck('name')->toArray();
 
         $superAdminRole->givePermissionTo($allPermissionNames);
 
         // Let's give few permissions to admin role.
         $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
         $adminRole->givePermissionTo(['create permission', 'view permission']);
         $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
         $adminRole->givePermissionTo(['create mazao', 'view mazao', 'update mazao']);
         $adminRole->givePermissionTo(['view beizamazao']);
         $adminRole->givePermissionTo(['create pembejeo', 'view pembejeo', 'update pembejeo', 'delete pembejeo']);



          // Lets give few permissions to mkulima role.
        $mkulimaRole->givePermissionTo(['view mazao', 'update mazao', 'create mazao']);
        $mkulimaRole->givePermissionTo(['view user','update user']);
        $mkulimaRole->givePermissionTo(['view beizamazao']);
        $mkulimaRole->givePermissionTo(['view pembejeo']);

 
 
         // Let's Create User and assign Role to it.
 
         $superAdminUser = User::firstOrCreate([
                     'email' => 'superadmin@gmail.com',
                 ], [
                     'name' => 'Super Admin',
                     'email' => 'superadmin@gmail.com',
                     'password' => Hash::make ('12345678'),
                 ]);
 
         $superAdminUser->assignRole($superAdminRole);
 
 
         $adminUser = User::firstOrCreate([
                             'email' => 'admin@gmail.com'
                         ], [
                             'name' => 'Admin',
                             'email' => 'admin@gmail.com',
                             'password' => Hash::make ('12345678'),
                         ]);
 
         $adminUser->assignRole($adminRole);
 
 
         $mkulimaUser = User::firstOrCreate([
                             'email' => 'mkulima@gmail.com',
                         ], [
                             'name' => 'mkulima',
                             'email' => 'mkulima@gmail.com',
                             'password' => Hash::make('12345678'),
                         ]);
 
         $mkulimaUser->assignRole($mkulimaRole);
     }
    
}

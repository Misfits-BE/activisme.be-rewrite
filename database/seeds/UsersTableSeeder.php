<?php

use Illuminate\Database\Seeder;
use App\Repositories\{RoleRepository, PermissionRepository, UserRepository}; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  PermissionRepository $permissionRepository   Abstraction layer bewteen seeder and database
     * @param  RoleRepository       $roleRepository         Abstraction layer bewteen seeder and database
     * @param  UserRepository       $userRepository         Abstraction layer bewteen seeder and database
     * @return void
     */
    public function run(PermissionRepository $permissionRepository, RoleRepository $roleRepository, UserRepository $userRepository): void
    {
       $permissions = []; //? No default permissions assigned for now.

       foreach ($permissions as $perms) { // Seed default permissions
           $permissionRepository->seedFirstOrCreate(['name' => $perms]);
       }

       $this->command->info('Default permissions added.');

       // Confirm roles needed
       if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {
           // Ask role from input
           $inputRoles = $this->command->ask('Enter roles in comma seperated format.', 'admin,user');
           // Explode roles
           $rolesArray = explode(',', $inputRoles); // BOOM!

           foreach ($rolesArray as $role) { // Add roles
               $roles = $roleRepository->entity();
               $role  = $roleRepository->seedFirstOrCreate(['name' => trim($role)]);

               if ($role->name == 'admin') {
                   // Assign all permissions
                   $roles->syncPermissions($permissionRepository->all());
                   $this->command->info('Admin granted all permissions.');
               } else { // Forother by default only read access
                   $roles->syncPermissions($permissionRepository->entity()->where('name', 'LIKE', 'view_%')->get());
               }

               $userRepository->seedCreateUser($role, $this->command);
           }

           $this->command->info('Roles' . $inputRoles . ' added successfully.');
       } else {
           $roleRepository->seedFirstOrCreate(['name' => 'user']);
           $this->command->info('Added only default user role.');
       }
    }
}

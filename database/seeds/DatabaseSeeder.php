<?php

use Illuminate\Database\Seeder;
use App\Repositories\{PermissionRepository, RoleRepository, UserRepository};

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void 
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, starting from blank database.');
        }

        // Run oàther seeders 
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        //\App\Models\Post::factory(50)->create();

        /** @var \App\Models\User $adminUser */
        $adminUser = User::factory()->create([
            'email' => 'waly0214@gmail.com',
            'first_name' => 'William',
            'last_name' => 'Wallace',
            'name' => 'William Wallace',
            'active' => true,
            'password' => '$2y$10$CVSEho6NhIJipDK6I3nyoeLOOV5VEFOpDCKqfuJxmd9cfq7Mvd2j.'
        ]);

        // $adminRole = Role::create([
        //     'name' => 'Admin',
        // ]);
        // $adminUser->assignRole($adminRole);
    }
}

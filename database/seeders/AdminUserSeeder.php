<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@lms.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'moderator',
            'email' => 'moderator@lms.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('moderator');

        $user = User::create([
            'name' => 'teacher',
            'email' => 'teacher@lms.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('teacher');


        $user = User::create([
            'name' => 'user',
            'email' => 'user@lms.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('user');
    }
}

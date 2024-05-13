<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'cathedralaizawl@gmail.com',
            'password' => 'spacepathum',
        ]);

        $user->assignRole('super_admin');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Nationality::create(['name' => 'Indian']);
    }
}

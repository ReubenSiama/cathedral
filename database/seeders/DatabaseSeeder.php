<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BishopSeeder::class,
            InstitutionSeeder::class,
            MassTimingSeeder::class,
            NationalitySeeder::class,
            PriestSeeder::class,
            ParishTableSeeder::class,
            ShieldSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}

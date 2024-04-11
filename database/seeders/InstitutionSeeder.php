<?php

namespace Database\Seeders;

use App\Enums\InstitutionType;
use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = 'Tlangnuam, Aizawl, Mizoram';

        $institutions = [
            [
                'type' => InstitutionType::INSTITUTION,
                'name' => 'St. Pauls Higher Secondary School',
                'slug' => 'st-pauls-higher-secondary-school',
                'address' => $address,
            ],
            [
                'type' => InstitutionType::INSTITUTION,
                'name' => 'Mary Mount School',
                'slug' => 'mary-mount-school',
                'address' => $address,
            ],
            [
                'type' => InstitutionType::INSTITUTION,
                'name' => 'Holy Trinity School',
                'slug' => 'holy-trinity-school',
                'address' => 'ITI Veng, Aizawl, Mizoram',
            ],
            [
                'type' => InstitutionType::INSTITUTION,
                'name' => 'St. Charles School',
                'slug' => 'st-charles-school',
                'address' => 'Maubawk, Aizawl, Mizoram',
            ],
            [
                'type' => InstitutionType::OTHERS,
                'name' => 'Zoram Entu Pawl',
                'slug' => 'zoram-entu-pawl',
                'address' => $address,
            ],
            [
                'type' => InstitutionType::OTHERS,
                'name' => 'St. Joseph\'s Press',
                'slug' => 'st-josephs-press',
                'address' => $address,
            ],
        ];

        Institution::upsert($institutions, ['name'], ['type', 'address']);
    }
}

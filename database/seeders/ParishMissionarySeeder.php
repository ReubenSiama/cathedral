<?php

namespace Database\Seeders;

use App\Enums\MissionaryType;
use Illuminate\Database\Seeder;

class ParishMissionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missionaries = [
            [
                'type' => MissionaryType::SISTER,
                'data' => [
                    [
                        'name' => 'Sr. Maria Angeli Sângpuii OSU',
                        'address' => 'Cathedral, Kulikawn',
                    ],
                    [
                        'name' => 'Sr. M. Christy Paul Lucy Laltlankimi MC',
                        'address' => 'Cathedral, Kulikawn',
                    ],
                    [
                        'name' => 'Sr. Maria Goretti Vânlalngaii UFS',
                        'address' => 'Cathedral, Kulikawn',
                    ],
                    [
                        'name' => 'Sr. Cecilia Chawngthanzauvi OSU',
                        'address' => 'Cathedral, Kulikawn',
                    ],
                    [
                        'name' => 'Sr. Irene Theresa Lalsângi BS',
                        'address' => 'St. James Church, Samtlang',
                    ],
                    [
                        'name' => 'Sr. Judith Lalrinliani BS',
                        'address' => 'St. James Church, Samtlang',
                    ],
                    [
                        'name' => 'Sr. Jacinta Vânlalruati UFS',
                        'address' => 'Holy Trinity Church, ITI Veng',
                    ],
                    [
                        'name' => 'Sr. Veronica Lalchhanhimi MSMHC',
                        'address' => 'Holy Trinity Church, ITI Veng',
                    ],
                    [
                        'name' => 'Sr. Adeline Lalremruati MC',
                        'address' => 'Holy Trinity Church, ITI Veng',
                    ],
                    [
                        'name' => 'Sr. Helen Lalremruati, MSMHC',
                        'address' => 'St. Padre Pio\'s Church, Khatla Bungkawn',
                    ],
                ],
            ],
            [
                'type' => MissionaryType::PRIEST,
                'data' => [
                    [
                        'name' => 'Rev. Fr. Caleb Laldawngsanga',
                        'address' => 'Cathedral, Kulikawn',
                    ],
                    [
                        'name' => 'Rev. Fr. Gabriel Laltlanthanga',
                        'address' => 'St. James Church, Samtlang',
                    ],
                    [
                        'name' => 'Rev. Fr. Joseph Zoliana SJ',
                        'address' => 'St. James Church, Samtlang',
                    ],
                ],
            ],
            [
                'type' => MissionaryType::BROTHER,
                'data' => [
                    [
                        'name' => 'Bro. Richard Roliana, SG',
                        'address' => 'Sacred Heart Church, Tlangnuam',
                    ],
                ],
            ],
        ];

        foreach ($missionaries as $missionary) {
            foreach ($missionary['data'] as $data) {
                \App\Models\ParishMissionary::create([
                    'type' => $missionary['type'],
                    'name' => $data['name'],
                    'address' => $data['address'],
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parishes = [
            'Christ The King Cathedral, Kulikawn',
            'St. Peter\'S Church, Silaimual',
            'St. Augustine\'S Church, Melriat',
            'St. Dominic\'S Church, Falkawn',
            'St. Andrew\'S Church, Muallungthu',
            'St. James Church, Samtlang',
            'Sacred Heart Church, Block Veng - Tlangnuam',
            'St. Mary\'S Church, Maubawk',
            'St.Padre Pio\'S Church, Khatla Bungkawn',
            'Holy Trinity Church, Iti',
            'Holy Family Church, Kanghmun',
        ];

        foreach ($parishes as $parish) {
            \App\Models\Parish::create([
                'name' => $parish,
            ]);
        }
    }
}

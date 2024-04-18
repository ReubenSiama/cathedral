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
            'CHRIST THE KING CATHEDRAL, KULIKAWN',
            'ST. PETER\'S CHURCH, SILAIMUAL',
            'ST. AUGUSTINE\'S CHURCH, MELRIAT',
            'ST. DOMINIC\'S CHURCH, FALKAWN',
            'ST. ANDREW\'S CHURCH, MUALLUNGTHU',
            'ST. JAMES CHURCH, SAMTLANG',
            'SACRED HEART CHURCH, BLOCK VENG - TLANGNUAM',
            'ST. MARY\'S CHURCH, MAUBAWK',
            'ST.PADRE PIO\'S CHURCH, KHATLA BUNGKAWN',
            'HOLY TRINITY CHURCH, ITI',
            'HOLY FAMILY CHURCH, KANGHMUN',
        ];

        foreach ($parishes as $parish) {
            \App\Models\Parish::create([
                'name' => $parish,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MassTimingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timings = [
            [
                'days' => 'Sunday',
                'english_time' => '7:00 AM',
                'mizo_time' => '10:00 AM',
            ],
            [
                'days' => 'Monday - Friday',
                'english_time' => '-',
                'mizo_time' => '6:00 PM',
            ],
            [
                'days' => 'Saturday (Mass for Children)',
                'english_time' => '7:00 AM',
                'mizo_time' => '-',
            ],
        ];

        \App\Models\MassTiming::upsert($timings, ['days'], ['english_time', 'mizo_time']);
    }
}

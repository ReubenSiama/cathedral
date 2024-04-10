<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BishopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bishops = [
            'Most Rev. Stephen Rotluanga, CSC DD',
            'Most Rev. Denzil D\'Souza, DD',
            'Most Rev. Joachim Walder, DD',
        ];

        \App\Models\Bishop::upsert(
            collect($bishops)->map(fn ($name) => compact('name'))->all(),
            ['name'],
            ['name']
        );
    }
}

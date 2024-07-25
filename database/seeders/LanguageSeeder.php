<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'English',
                'locale' => 'en',
            ],
            [
                'name' => 'Mizo',
                'locale' => 'mz',
            ]
        ];

        \App\Models\Language::insert($languages);
    }
}

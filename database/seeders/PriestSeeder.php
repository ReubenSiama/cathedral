<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PriestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priests = [
            [
                'name' => 'Fr. A.',
                'surname' => 'Jeyaseelan',
            ],
            [
                'name' => 'Fr. Andrew',
                'surname' => 'Lalbiakfela',
            ],
            [
                'name' => 'Fr. Caleb',
                'surname' => 'Laldawngsanga',
            ],
            [
                'name' => 'Fr. Christudhas',
                'surname' => 'M.',
            ],
            [
                'name' => 'Fr. David',
                'surname' => 'Lalthanmawia',
            ],
            [
                'name' => 'Fr. Francis',
                'surname' => 'Veliyil',
            ],
            [
                'name' => 'Fr. Gabriel',
                'surname' => 'Laltlanthanga',
            ],
            [
                'name' => 'Fr. Gabriel',
                'surname' => 'Pinto',
            ],
            [
                'name' => 'Fr. Gabriel',
                'surname' => 'Vanmalsawma',
            ],
            [
                'name' => 'Fr. Henry',
                'surname' => 'Laldinmawia',
            ],
            [
                'name' => 'Fr. I.',
                'surname' => 'Balthasar',
            ],
            [
                'name' => 'Fr. James',
                'surname' => 'Lalruattluanga',
            ],
            [
                'name' => 'Fr. James',
                'surname' => 'Zodinliana',
            ],
            [
                'name' => 'Fr. Jerome',
                'surname' => 'Lalrinsanga',
            ],
            [
                'name' => 'Fr. Jerome',
                'surname' => 'Vungbiakdika',
            ],
            [
                'name' => 'Fr. John',
                'surname' => 'Zoduhsanga',
            ],
            [
                'name' => 'Fr. Joseph',
                'surname' => 'Lalbiakthanga',
            ],
            [
                'name' => 'Fr. K Maria',
                'surname' => 'Arullappan',
            ],
            [
                'name' => 'Fr. Mathew',
                'surname' => 'Arackal',
            ],
            [
                'name' => 'Fr. Paul',
                'surname' => 'Tuangkhanlal',
            ],
            [
                'name' => 'Fr. Praveen',
                'surname' => 'Fernandes',
            ],
            [
                'name' => 'Fr. Roman',
                'surname' => 'Mascarenhas',
            ],
            [
                'name' => 'Fr. S. Lawrence',
                'surname' => 'Kennedy',
            ],
            [
                'name' => 'Fr. S.',
                'surname' => 'Michael',
            ],
            [
                'name' => 'Fr. V. A.',
                'surname' => 'Paul',
            ],
        ];

        \App\Models\Priest::upsert(
            $priests,
            ['name', 'surname'],
            ['name', 'surname']
        );
    }
}

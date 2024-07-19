<?php

namespace Database\Seeders;

use App\Enums\CatechistType;
use Illuminate\Database\Seeder;

class CatechistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catechists = [
            [
                'type' => CatechistType::DIOCESE,
                'data' => [
                    [
                        'name' => 'Cate. John Lalthuamliana',
                        'from' => '2022-04-01',
                    ],
                    [
                        'name' => 'Cate. John Rambuatsaiha',
                        'from' => '2017-04-01',
                        'to' => '2022-03-30',
                    ],
                    [
                        'name' => 'Cate. Paul R. Biakchhawna',
                        'from' => '2012-05-01',
                        'to' => '2017-04-30',
                    ],
                    [
                        'name' => 'Cate. Joseph Lalsangzuala',
                        'from' => '2005-02-01',
                        'to' => '2012-04-30',
                    ],
                    [
                        'name' => 'Cate. Jerome Lalhmingliana',
                        'from' => '1996-06-01',
                        'to' => '2005-02-28',
                    ],
                    [
                        'name' => 'Cate. Anthony Lalengliana',
                        'from' => '1979-01-01',
                        'to' => '2005-11-30',
                    ],
                ],
            ],
            [
                'type' => CatechistType::LOCAL,
                'data' => [
                    [
                        'name' => 'Pu Andrew Tlangthankhuma',
                        'from' => '2007-09-01',
                        'address' => 'Lungtan',
                    ],
                    [
                        'name' => 'Pu Romuald Lalhuliana, Catechist retired',
                    ],
                    [
                        'name' => 'Pu Phillip Lungmuana, Catechist retired',
                    ],
                    [
                        'name' => 'Pu George Lalthanmawia, Sâmtlâng',
                    ],
                    [
                        'name' => 'Pu Peter Lalzuala, Kâwltheihuan, Aizâwl',
                    ],
                    [
                        'name' => 'Pu John Hmangaihzuala, Mêlriat',
                    ],
                    [
                        'name' => 'Pu Hilary Lalhriatpuia, Seling',
                    ],
                    [
                        'name' => 'Pu Robert Hualhmingliana, Mêlriat',
                    ],
                    [
                        'name' => 'Pu Athony Lalêngliana, Catechist retired',
                    ],
                    [
                        'name' => 'Pu Joseph Biakthanga, Khawruhlian',
                    ],
                    [
                        'name' => 'Pu Joseph M.S. Dawngliana, Maubâwk',
                    ],
                    [
                        'name' => 'Pu Linus Chuailova, Muthi',
                    ],
                    [
                        'name' => 'Sr. Mary Lalbiaktluangi, MSMHC',
                    ],
                    [
                        'name' => 'Sr. Angela Luno, MSMHC',
                    ],
                    [
                        'name' => 'Sr. Elizabeth C. Lalhmunsiami, MSMHC',
                    ],
                    [
                        'name' => 'Sr. Celine Zosângpuii, MSMHC',
                    ],
                    [
                        'name' => 'Sr. Anastasia Ngûrte, MSMHC',
                    ],
                ],
            ],
        ];

        foreach ($catechists as $catechist) {
            foreach ($catechist['data'] as $data) {
                \App\Models\Catechist::create([
                    'type' => $catechist['type'],
                    'name' => $data['name'],
                    'address' => $data['address'] ?? null,
                    'from' => $data['from'] ?? null,
                    'to' => $data['to'] ?? null,
                ]);
            }
        }
    }
}

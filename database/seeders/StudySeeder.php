<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Fashohah',
                'min' => 23,
                'max' => 28,
            ],
            [
                'name' => 'Tajwid',
                'min' => 35,
                'max' => 45,
            ],
            [
                'name' => 'Ghorib muskilat',
                'min' => 7,
                'max' => 10,
            ],
            [
                'name' => 'Suara & lagu',
                'min' => 5,
                'max' => 7,
            ],
            [
                'name' => 'Sholat',
                'min' => 7,
                'max' => 10,
            ],
            [
                'name' => 'Doa harian',
                'min' => 7,
                'max' => 10,
            ],
            [
                'name' => 'Surat pendek',
                'min' => 7,
                'max' => 10,
            ],
            [
                'name' => 'Tahsin',
                'min' => 7,
                'max' => 10,
            ],
        ];

        Study::insert($data);
    }
}

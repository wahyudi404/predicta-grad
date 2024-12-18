<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0 = -, 1 = tidak lulus, 2 = lulus
        $data = [
            [
                'name' => 'Bintang Dwi Jelita',
                'origin_of_institution' => 'Hidayatullah',
                'address' => 'Junggo Sukolelo Prigen',
                'isPassed' => 1,
            ],
            [
                'name' => 'Aliyah Vynnajah',
                'origin_of_institution' => 'Hidayatullah',
                'address' => 'Junggo Sukolelo Prigen',
                'isPassed' => 2,
            ],
            [
                'name' => 'Gadys Amorta Suherman Kahfi',
                'origin_of_institution' => 'Hidayatullah',
                'address' => 'Junggo Sukolelo Prigen',
                'isPassed' => 2,
            ],
            [
                'name' => 'Talitha Yasmin Naurah',
                'origin_of_institution' => 'Hidayatullah',
                'address' => 'Junggo Sukolelo Prigen',
                'isPassed' => 2,
            ],
            [
                'name' => "Marwa'azmi Febrianah",
                'origin_of_institution' => 'Hidayatullah',
                'address' => 'Junggo Sukolelo Prigen',
                'isPassed' => 2,
            ],
            [
                'name' => "Kafiyah Izzatul Hasanah",
                'origin_of_institution' => 'Hidayatullah',
                'address' => 'Junggo Sukolelo Prigen',
                'isPassed' => 2,
            ],
            [
                'name' => "Dinar Fauziyah Alfadilah",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Charizah Ishmatul Izzah",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Adiba Syakila Nur Syifa",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Aristi Mahira Cahya Kamila",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Jamilah Syauqiyah Maulidia",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Qiara Nur Ashilla Rahmania Putri",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Jelita Puri Ramadhani",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Muhammad Altof Azizi Elbarca",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Kenzie Al-Athatra Ahmad Anggraono",
                'origin_of_institution' => 'Roudlotul Ulum',
                'address' => 'Sumberejo',
                'isPassed' => 2,
            ],
            [
                'name' => "Abyadhika Bayuputra Permana",
                'origin_of_institution' => 'Alhasani',
                'address' => 'PERUM GRAHA PESONA, SIDOWAYAH, BEJI',
                'isPassed' => 2,
            ],
            [
                'name' => "Ganendra Reyshan Prabowo",
                'origin_of_institution' => 'Alhasani',
                'address' => 'PERUM BUMI AURA PERSADA, KOLURSARI, BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "Akhmad Zulfikar Al Qurthuby",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl.Apel 408 Rt 04/08 Kidul Dalem Bangil',
                'isPassed' => 2,
            ],
            [
                'name' => "Mutiara Az-Zahratu Maulida",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl.Kolursari 252 Gg.Langgar Rt 05/01 Mendalan Bangil',
                'isPassed' => 2,
            ],
            [
                'name' => "Nayra Amalina Khayrani",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl.Apel Perum Dinas Kebersihan',
                'isPassed' => 2,
            ],
            [
                'name' => "Muhammad Bagus Permadi",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl.M.Yasin RT 01/01 no:66 Mendalan Bangil',
                'isPassed' => 2,
            ],
            [
                'name' => "Muhammad Atha Firdaus Ihwan",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl.M.Yasin RT 01/01 Mendalan Bangil',
                'isPassed' => 2,
            ],
            [
                'name' => "Muhammad Zufar Arkana",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl.Durian Rt 04/07 656',
                'isPassed' => 2,
            ],
            [
                'name' => "Azkiyah Hilyatun Najwa",
                'origin_of_institution' => 'Kyai Said',
                'address' => 'Jl Bangil Pandaan Sidowayah Bangil',
                'isPassed' => 2,
            ],
            [
                'name' => "RAFARDHAN  ATHAILLAH  PRASTYO",
                'origin_of_institution' => 'Green Bangil',
                'address' => 'PERUM GREEN BANGIL D1-34',
                'isPassed' => 2,
            ],
            [
                'name' => "MOCHAMMAD FAIZ AL FARIZI",
                'origin_of_institution' => 'Green Bangil',
                'address' => 'PERUM DE GRAHA RESIDENCE C-08',
                'isPassed' => 2,
            ], ////
            [
                'name' => "NOVAN AZRIEL NAVIS",
                'origin_of_institution' => 'Green Bangil',
                'address' => 'PERUM GREEN BANGIL C5-09',
                'isPassed' => 2,
            ],
            [
                'name' => "AMIRUL MUKMININ",
                'origin_of_institution' => 'Green Bangil',
                'address' => 'PERUM GREEN BANGIL D2-07',
                'isPassed' => 2,
            ],
            [
                'name' => "MUHAMMAD YAZID ABDUK QODIR",
                'origin_of_institution' => 'NURUL ADZIM',
                'address' => 'BLOK E5 / 08 PERUMAHAN GREEN BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "EARLYTA ARSYFA SALSABILA",
                'origin_of_institution' => 'ATTAUHID',
                'address' => 'SUKALIPURO DERMO',
                'isPassed' => 2,
            ],
            [
                'name' => "ASYANI AISYAH NURRAHMA",
                'origin_of_institution' => 'ATTAUHID',
                'address' => 'SUKALIPURO DERMO',
                'isPassed' => 2,
            ],
            [
                'name' => "AZZALIA IQRIMA RAMDANI",
                'origin_of_institution' => 'Darul Muttaqin',
                'address' => 'LUMPANG BOLONG, DERMO, BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "ITA FADILA",
                'origin_of_institution' => 'Darul Muttaqin',
                'address' => 'LUMPANG BOLONG, DERMO, BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "MUZAYANATUL AROFAH",
                'origin_of_institution' => 'Darul Muttaqin',
                'address' => 'LUMPANG BOLONG, DERMO, BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "NAFISAH NUR SHOUMI FIRMANSYAH",
                'origin_of_institution' => 'Darul Muttaqin',
                'address' => 'LUMPANG BOLONG, DERMO, BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "OLIVIA AZZAHRA",
                'origin_of_institution' => 'Darul Muttaqin',
                'address' => 'LUMPANG BOLONG, DERMO, BANGIL',
                'isPassed' => 2,
            ],
            [
                'name' => "LAKSMANA NUR SANJAYA",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 1,
            ],
            [
                'name' => "AHMAD SYARIF",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 1,
            ],
            [
                'name' => "RADITYA AGHA FIRMANSYAH",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 1,
            ],
            [
                'name' => "NISCA AYU WANDIRA",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 1,
            ],
            [
                'name' => "KARTIKA DWI LESTARI",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 1,
            ],
            [
                'name' => "SAHILA ZULFA",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 2,
            ],
            [
                'name' => "SYIFA AZZALEA ACHIN",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 2,
            ],
            [
                'name' => "TALITA AQILA JASMINE",
                'origin_of_institution' => 'AL-IKLAS',
                'address' => 'GANTI SUKOLELO PRIGEN',
                'isPassed' => 1,
            ],
        ];

        Participant::insert($data);
    }
}

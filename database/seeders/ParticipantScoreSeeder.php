<?php

namespace Database\Seeders;

use App\Models\ParticipantScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $part1 = [
            ['participant_id' => 1, 'study_id' => 1, 'score' => 22],
            ['participant_id' => 1, 'study_id' => 2, 'score' => 37],
            ['participant_id' => 1, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 1, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 1, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 1, 'study_id' => 6, 'score' => 7],
            ['participant_id' => 1, 'study_id' => 7, 'score' => 7.8],
            ['participant_id' => 1, 'study_id' => 8, 'score' => 6],
        ];
        $part2 = [
            ['participant_id' => 2, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 2, 'study_id' => 2, 'score' => 36],
            ['participant_id' => 2, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 2, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 2, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 2, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 2, 'study_id' => 7, 'score' => 6.1],
            ['participant_id' => 2, 'study_id' => 8, 'score' => 5],
        ];
        $part3 = [
            ['participant_id' => 3, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 3, 'study_id' => 2, 'score' => 37],
            ['participant_id' => 3, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 3, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 3, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 3, 'study_id' => 6, 'score' => 6],
            ['participant_id' => 3, 'study_id' => 7, 'score' => 6.6],
            ['participant_id' => 3, 'study_id' => 8, 'score' => 5],
        ];
        // 26	42	8	6	9	8	7,8	7,3
        $part4 = [
            ['participant_id' => 4, 'study_id' => 1, 'score' => 26],
            ['participant_id' => 4, 'study_id' => 2, 'score' => 42],
            ['participant_id' => 4, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 4, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 4, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 4, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 4, 'study_id' => 7, 'score' => 7.8],
            ['participant_id' => 4, 'study_id' => 8, 'score' => 7.3],
        ];
        // 26	40	8	6	9	8	9,4	7,0
        $part5 = [
            ['participant_id' => 5, 'study_id' => 1, 'score' => 26],
            ['participant_id' => 5, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 5, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 5, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 5, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 5, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 5, 'study_id' => 7, 'score' => 9.4],
            ['participant_id' => 5, 'study_id' => 8, 'score' => 7.0],
        ];
        // 25	35	7	6	8	9	8,1	8,2
        $part6 = [
            ['participant_id' => 6, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 6, 'study_id' => 2, 'score' => 35],
            ['participant_id' => 6, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 6, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 6, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 6, 'study_id' => 6, 'score' => 9],
            ['participant_id' => 6, 'study_id' => 7, 'score' => 8.1],
            ['participant_id' => 6, 'study_id' => 8, 'score' => 8.2],
        ];
        // 24	41	8	6	7	10	7,4	7,5
        $part7 = [
            ['participant_id' => 7, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 7, 'study_id' => 2, 'score' => 41],
            ['participant_id' => 7, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 7, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 7, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 7, 'study_id' => 6, 'score' => 10],
            ['participant_id' => 7, 'study_id' => 7, 'score' => 7.4],
            ['participant_id' => 7, 'study_id' => 8, 'score' => 7.5],
        ];
        // 25	42	9	6	7	9	8,1	7,7
        $part8 = [
            ['participant_id' => 8, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 8, 'study_id' => 2, 'score' => 42],
            ['participant_id' => 8, 'study_id' => 3, 'score' => 9],
            ['participant_id' => 8, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 8, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 8, 'study_id' => 6, 'score' => 9],
            ['participant_id' => 8, 'study_id' => 7, 'score' => 8.1],
            ['participant_id' => 8, 'study_id' => 8, 'score' => 7.7],
        ];
        // 25	40	8	6	7	5	8,7
        $part9 = [
            ['participant_id' => 9, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 9, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 9, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 9, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 9, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 9, 'study_id' => 6, 'score' => 5],
            ['participant_id' => 9, 'study_id' => 7, 'score' => 8.7],
            ['participant_id' => 9, 'study_id' => 8, 'score' => 7.8],
        ];
        // 25	40	8	6	7	8	9,1	6,8
        $part10 = [
            ['participant_id' => 10, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 10, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 10, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 10, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 10, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 10, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 10, 'study_id' => 7, 'score' => 9.1],
            ['participant_id' => 10, 'study_id' => 8, 'score' => 6.8],
        ];
        // 25	43	8	6	7	9	7,6	6,3
        $part11 = [
            ['participant_id' => 11, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 11, 'study_id' => 2, 'score' => 43],
            ['participant_id' => 11, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 11, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 11, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 11, 'study_id' => 6, 'score' => 9],
            ['participant_id' => 11, 'study_id' => 7, 'score' => 7.6],
            ['participant_id' => 11, 'study_id' => 8, 'score' => 6.3],
        ];
        // 25	40	8	6	8	9	9,0	5,5
        $part12 = [
            ['participant_id' => 12, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 12, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 12, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 12, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 12, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 12, 'study_id' => 6, 'score' => 9],
            ['participant_id' => 12, 'study_id' => 7, 'score' => 9.0],
            ['participant_id' => 12, 'study_id' => 8, 'score' => 5.5],
        ];
        // 27	40	8	6	7	10	8,4	7,4
        $part13 = [
            ['participant_id' => 13, 'study_id' => 1, 'score' => 27],
            ['participant_id' => 13, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 13, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 13, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 13, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 13, 'study_id' => 6, 'score' => 10],
            ['participant_id' => 13, 'study_id' => 7, 'score' => 8.4],
            ['participant_id' => 13, 'study_id' => 8, 'score' => 7.4],
        ];
        // 23	37	10	6	10	8	7,8	5,0
        $part14 = [
            ['participant_id' => 14, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 14, 'study_id' => 2, 'score' => 37],
            ['participant_id' => 14, 'study_id' => 3, 'score' => 10],
            ['participant_id' => 14, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 14, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 14, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 14, 'study_id' => 7, 'score' => 7.8],
            ['participant_id' => 14, 'study_id' => 8, 'score' => 5.0],
        ];
        // 24	35	10	6	10	7	7,8	7,0
        $part15 = [
            ['participant_id' => 15, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 15, 'study_id' => 2, 'score' => 35],
            ['participant_id' => 15, 'study_id' => 3, 'score' => 10],
            ['participant_id' => 15, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 15, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 15, 'study_id' => 6, 'score' => 7],
            ['participant_id' => 15, 'study_id' => 7, 'score' => 7.8],
            ['participant_id' => 15, 'study_id' => 8, 'score' => 7.0],
        ];
        // 24	40	8	6	7	10	8,6	8,0
        $part16 = [
            ['participant_id' => 16, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 16, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 16, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 16, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 16, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 16, 'study_id' => 6, 'score' => 10],
            ['participant_id' => 16, 'study_id' => 7, 'score' => 8.6],
            ['participant_id' => 16, 'study_id' => 8, 'score' => 8.0],
        ];
        // 25	41	8	6	6	10	9,7	6,0
        $part17 = [
            ['participant_id' => 17, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 17, 'study_id' => 2, 'score' => 41],
            ['participant_id' => 17, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 17, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 17, 'study_id' => 5, 'score' => 6],
            ['participant_id' => 17, 'study_id' => 6, 'score' => 10],
            ['participant_id' => 17, 'study_id' => 7, 'score' => 9.7],
            ['participant_id' => 17, 'study_id' => 8, 'score' => 6.0],
        ];
        // 24	40	8	6	9	9,5	7,6	5,0
        $part18 = [
            ['participant_id' => 18, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 18, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 18, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 18, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 18, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 18, 'study_id' => 6, 'score' => 9.5],
            ['participant_id' => 18, 'study_id' => 7, 'score' => 7.6],
            ['participant_id' => 18, 'study_id' => 8, 'score' => 5.0],
        ];
        // 25	40	9	6	9	8	8,6	5,0
        $part19 = [
            ['participant_id' => 19, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 19, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 19, 'study_id' => 3, 'score' => 9],
            ['participant_id' => 19, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 19, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 19, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 19, 'study_id' => 7, 'score' => 8.6],
            ['participant_id' => 19, 'study_id' => 8, 'score' => 5.0],
        ];
        // 24	41	8	6	9	4	7,8	5,0
        $part20 = [
            ['participant_id' => 20, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 20, 'study_id' => 2, 'score' => 41],
            ['participant_id' => 20, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 20, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 20, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 20, 'study_id' => 6, 'score' => 4],
            ['participant_id' => 20, 'study_id' => 7, 'score' => 7.8],
            ['participant_id' => 20, 'study_id' => 8, 'score' => 5.0],
        ];
        // 25	45	10	6	8	8	8,0	6,5
        $part21 = [
            ['participant_id' => 21, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 21, 'study_id' => 2, 'score' => 45],
            ['participant_id' => 21, 'study_id' => 3, 'score' => 10],
            ['participant_id' => 21, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 21, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 21, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 21, 'study_id' => 7, 'score' => 8],
            ['participant_id' => 21, 'study_id' => 8, 'score' => 6.5],
        ];
        // 23	43	9	5	10	5	9,1	6,5
        $part22 = [
            ['participant_id' => 22, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 22, 'study_id' => 2, 'score' => 43],
            ['participant_id' => 22, 'study_id' => 3, 'score' => 9],
            ['participant_id' => 22, 'study_id' => 4, 'score' => 5],
            ['participant_id' => 22, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 22, 'study_id' => 6, 'score' => 5],
            ['participant_id' => 22, 'study_id' => 7, 'score' => 9.1],
            ['participant_id' => 22, 'study_id' => 8, 'score' => 6.5],
        ];
        // 24	40	8	6	9	9	8,1	5,0
        $part23 = [
            ['participant_id' => 23, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 23, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 23, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 23, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 23, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 23, 'study_id' => 6, 'score' => 9],
            ['participant_id' => 23, 'study_id' => 7, 'score' => 8.1],
            ['participant_id' => 23, 'study_id' => 8, 'score' => 5.0],
        ];
        // 23	43	8	6	7	9	9,1	5,0
        $part24 = [
            ['participant_id' => 24, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 24, 'study_id' => 2, 'score' => 43],
            ['participant_id' => 24, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 24, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 24, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 24, 'study_id' => 6, 'score' => 9],
            ['participant_id' => 24, 'study_id' => 7, 'score' => 9.1],
            ['participant_id' => 24, 'study_id' => 8, 'score' => 5.0],
        ];
        // 27	42	8	6	7	8	8,5	7,1
        $part25 = [
            ['participant_id' => 25, 'study_id' => 1, 'score' => 27],
            ['participant_id' => 25, 'study_id' => 2, 'score' => 42],
            ['participant_id' => 25, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 25, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 25, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 25, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 25, 'study_id' => 7, 'score' => 8.5],
            ['participant_id' => 25, 'study_id' => 8, 'score' => 7.1],
        ];
        // 26	41	8	6	10	10	8,7	7,8
        $part26 = [
            ['participant_id' => 26, 'study_id' => 1, 'score' => 26],
            ['participant_id' => 26, 'study_id' => 2, 'score' => 41],
            ['participant_id' => 26, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 26, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 26, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 26, 'study_id' => 6, 'score' => 10],
            ['participant_id' => 26, 'study_id' => 7, 'score' => 8.7],
            ['participant_id' => 26, 'study_id' => 8, 'score' => 7.8],
        ];
        // 26	41	8	7	10	8	10,0	8,7
        $part27 = [
            ['participant_id' => 27, 'study_id' => 1, 'score' => 26],
            ['participant_id' => 27, 'study_id' => 2, 'score' => 41],
            ['participant_id' => 27, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 27, 'study_id' => 4, 'score' => 7],
            ['participant_id' => 27, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 27, 'study_id' => 6, 'score' => 8],
            ['participant_id' => 27, 'study_id' => 7, 'score' => 10],
            ['participant_id' => 27, 'study_id' => 8, 'score' => 8.7],
        ];
        // 27	42	8	7	8	7	9,1	8,8
        $part28 = [
            ['participant_id' => 28, 'study_id' => 1, 'score' => 27],
            ['participant_id' => 28, 'study_id' => 2, 'score' => 42],
            ['participant_id' => 28, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 28, 'study_id' => 4, 'score' => 7],
            ['participant_id' => 28, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 28, 'study_id' => 6, 'score' => 7],
            ['participant_id' => 28, 'study_id' => 7, 'score' => 9.1],
            ['participant_id' => 28, 'study_id' => 8, 'score' => 8.8],
        ];
        // 23	43	8	6	10	7	7,8	5,0
        $part29 = [
            ['participant_id' => 29, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 29, 'study_id' => 2, 'score' => 43],
            ['participant_id' => 29, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 29, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 29, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 29, 'study_id' => 6, 'score' => 7],
            ['participant_id' => 29, 'study_id' => 7, 'score' => 7.8],
            ['participant_id' => 29, 'study_id' => 8, 'score' => 5],
        ];
        // 24	37	7	6	7	5	7,4	7,0
        $part30 = [
            ['participant_id' => 30, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 30, 'study_id' => 2, 'score' => 37],
            ['participant_id' => 30, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 30, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 30, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 30, 'study_id' => 6, 'score' => 5],
            ['participant_id' => 30, 'study_id' => 7, 'score' => 7.4],
            ['participant_id' => 30, 'study_id' => 8, 'score' => 7],
        ];
        // 23	39	7	6	7	6	7,6	6,5
        $part31 = [
            ['participant_id' => 31, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 31, 'study_id' => 2, 'score' => 39],
            ['participant_id' => 31, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 31, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 31, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 31, 'study_id' => 6, 'score' => 6],
            ['participant_id' => 31, 'study_id' => 7, 'score' => 7.6],
            ['participant_id' => 31, 'study_id' => 8, 'score' => 6.5],
        ];
        // 24	40	7	6	9	0	6,6	5,0
        $part32 = [
            ['participant_id' => 32, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 32, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 32, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 32, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 32, 'study_id' => 5, 'score' => 9],
            ['participant_id' => 32, 'study_id' => 6, 'score' => 0],
            ['participant_id' => 32, 'study_id' => 7, 'score' => 6.6],
            ['participant_id' => 32, 'study_id' => 8, 'score' => 5.0],
        ];
        // 24	35	7	6	10	7	7,6	7,0
        $part33 = [
            ['participant_id' => 33, 'study_id' => 1, 'score' => 24],
            ['participant_id' => 33, 'study_id' => 2, 'score' => 35],
            ['participant_id' => 33, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 33, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 33, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 33, 'study_id' => 6, 'score' => 7],
            ['participant_id' => 33, 'study_id' => 7, 'score' => 7.6],
            ['participant_id' => 33, 'study_id' => 8, 'score' => 7],
        ];
        // 23	42	8	6	8	2	5,7	5,0
        $part34 = [
            ['participant_id' => 34, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 34, 'study_id' => 2, 'score' => 42],
            ['participant_id' => 34, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 34, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 34, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 34, 'study_id' => 6, 'score' => 2],
            ['participant_id' => 34, 'study_id' => 7, 'score' => 5.7],
            ['participant_id' => 34, 'study_id' => 8, 'score' => 5.0],
        ];
        // 23	40	8	6	8	0	6,1	5,0
        $part35 = [
            ['participant_id' => 35, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 35, 'study_id' => 2, 'score' => 40],
            ['participant_id' => 35, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 35, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 35, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 35, 'study_id' => 6, 'score' => 0],
            ['participant_id' => 35, 'study_id' => 7, 'score' => 6.1],
            ['participant_id' => 35, 'study_id' => 8, 'score' => 5.0],
        ];
        // 25	36	8	6	10	3	7,6	5,0
        $part36 = [
            ['participant_id' => 36, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 36, 'study_id' => 2, 'score' => 36],
            ['participant_id' => 36, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 36, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 36, 'study_id' => 5, 'score' => 10],
            ['participant_id' => 36, 'study_id' => 6, 'score' => 3],
            ['participant_id' => 36, 'study_id' => 7, 'score' => 7.6],
            ['participant_id' => 36, 'study_id' => 8, 'score' => 5.0],
        ];
        // 22	43	7	6	6	1	3,8	5,0
        $part37 = [
            ['participant_id' => 37, 'study_id' => 1, 'score' => 22],
            ['participant_id' => 37, 'study_id' => 2, 'score' => 43],
            ['participant_id' => 37, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 37, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 37, 'study_id' => 5, 'score' => 6],
            ['participant_id' => 37, 'study_id' => 6, 'score' => 1],
            ['participant_id' => 37, 'study_id' => 7, 'score' => 3.8],
            ['participant_id' => 37, 'study_id' => 8, 'score' => 5.0],
        ];
        // 23	30	6	5	4	0	5,4	5,0
        $part38 = [
            ['participant_id' => 38, 'study_id' => 1, 'score' => 23],
            ['participant_id' => 38, 'study_id' => 2, 'score' => 30],
            ['participant_id' => 38, 'study_id' => 3, 'score' => 6],
            ['participant_id' => 38, 'study_id' => 4, 'score' => 5],
            ['participant_id' => 38, 'study_id' => 5, 'score' => 4],
            ['participant_id' => 38, 'study_id' => 6, 'score' => 0],
            ['participant_id' => 38, 'study_id' => 7, 'score' => 5.4],
            ['participant_id' => 38, 'study_id' => 8, 'score' => 5.0],
        ];
        // 22	31	6	6	6	4	5,3	5,0
        $part39 = [
            ['participant_id' => 39, 'study_id' => 1, 'score' => 22],
            ['participant_id' => 39, 'study_id' => 2, 'score' => 31],
            ['participant_id' => 39, 'study_id' => 3, 'score' => 6],
            ['participant_id' => 39, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 39, 'study_id' => 5, 'score' => 6],
            ['participant_id' => 39, 'study_id' => 6, 'score' => 4],
            ['participant_id' => 39, 'study_id' => 7, 'score' => 5.7],
            ['participant_id' => 39, 'study_id' => 8, 'score' => 5.0],
        ];
        // 21	31	6	5	5	0	3,8	5,0
        $part40 = [
            ['participant_id' => 40, 'study_id' => 1, 'score' => 21],
            ['participant_id' => 40, 'study_id' => 2, 'score' => 31],
            ['participant_id' => 40, 'study_id' => 3, 'score' => 6],
            ['participant_id' => 40, 'study_id' => 4, 'score' => 5],
            ['participant_id' => 40, 'study_id' => 5, 'score' => 5],
            ['participant_id' => 40, 'study_id' => 6, 'score' => 0],
            ['participant_id' => 40, 'study_id' => 7, 'score' => 3.8],
            ['participant_id' => 40, 'study_id' => 8, 'score' => 5.0],
        ];
        // 21	29	5	5	5	0	5,0	5,0
        $part41 = [
            ['participant_id' => 41, 'study_id' => 1, 'score' => 21],
            ['participant_id' => 41, 'study_id' => 2, 'score' => 29],
            ['participant_id' => 41, 'study_id' => 3, 'score' => 5],
            ['participant_id' => 41, 'study_id' => 4, 'score' => 5],
            ['participant_id' => 41, 'study_id' => 5, 'score' => 5],
            ['participant_id' => 41, 'study_id' => 6, 'score' => 0],
            ['participant_id' => 41, 'study_id' => 7, 'score' => 5.0],
            ['participant_id' => 41, 'study_id' => 8, 'score' => 5.0],
        ];
        // 25	44	8	6	6	2	5,7	5,0
        $part42 = [
            ['participant_id' => 42, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 42, 'study_id' => 2, 'score' => 44],
            ['participant_id' => 42, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 42, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 42, 'study_id' => 5, 'score' => 6],
            ['participant_id' => 42, 'study_id' => 6, 'score' => 2],
            ['participant_id' => 42, 'study_id' => 7, 'score' => 5.7],
            ['participant_id' => 42, 'study_id' => 8, 'score' => 5.0],
        ];
        // 25	45	8	6	7	5	7,0	5,0
        $part43 = [
            ['participant_id' => 43, 'study_id' => 1, 'score' => 25],
            ['participant_id' => 43, 'study_id' => 2, 'score' => 45],
            ['participant_id' => 43, 'study_id' => 3, 'score' => 8],
            ['participant_id' => 43, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 43, 'study_id' => 5, 'score' => 7],
            ['participant_id' => 43, 'study_id' => 6, 'score' => 5],
            ['participant_id' => 43, 'study_id' => 7, 'score' => 7.0],
            ['participant_id' => 43, 'study_id' => 8, 'score' => 5.0],
        ];
        // 22	35	7	6	8	0	3,8	5,0
        $part44 = [
            ['participant_id' => 44, 'study_id' => 1, 'score' => 22],
            ['participant_id' => 44, 'study_id' => 2, 'score' => 35],
            ['participant_id' => 44, 'study_id' => 3, 'score' => 7],
            ['participant_id' => 44, 'study_id' => 4, 'score' => 6],
            ['participant_id' => 44, 'study_id' => 5, 'score' => 8],
            ['participant_id' => 44, 'study_id' => 6, 'score' => 0],
            ['participant_id' => 44, 'study_id' => 7, 'score' => 3.8],
            ['participant_id' => 44, 'study_id' => 8, 'score' => 5.0],
        ];
        $participants = [
            ...$part1,
            ...$part2,
            ...$part3,
            ...$part4,
            ...$part5,
            ...$part6,
            ...$part7,
            ...$part8,
            ...$part9,
            ...$part10,
            ...$part11,
            ...$part12,
            ...$part13,
            ...$part14,
            ...$part15,
            ...$part16,
            ...$part17,
            ...$part18,
            ...$part19,
            ...$part20,
            ...$part21,
            ...$part22,
            ...$part23,
            ...$part24,
            ...$part25,
            ...$part26,
            ...$part27,
            ...$part28,
            ...$part29,
            ...$part30,
            ...$part31,
            ...$part32,
            ...$part33,
            ...$part34,
            ...$part35,
            ...$part36,
            ...$part37,
            ...$part38,
            ...$part39,
            ...$part40,
            ...$part41,
            ...$part42,
            ...$part43,
            ...$part44,
        ];

        $data = array_merge($participants);

        ParticipantScore::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\LondonPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LondonPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'section' => 1,
            ],
            [
                'section' => 2,
            ],
            [
                'section' => 3,
            ],
            [
                'section' => 4,
            ],
            [
                'section' => 5,
            ],
            [
                'section' => 6,
            ],
            [
                'section' => 7,
            ],
            [
                'section' => 8,
            ],
            [
                'section' => 9,
            ],
            [
                'section' => 10,
            ],
            [
                'section' => 11,
            ],
        ];

        foreach ($blocks as $block) {
            LondonPage::updateOrCreate(
                [
                    'section' => $block['section'],
                    'is_card' => 0,
                ],
                [
                    'published' => 0,
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\AccraPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccraPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'section' => 1,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 2,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 3,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 4,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 5,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 6,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 7,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 8,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 9,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 10,
                'title' => 'Lorem ipsum dolor...',
            ],
            [
                'section' => 11,
                'title' => 'Lorem ipsum dolor...',
            ],
        ];

        foreach ($blocks as $block) {
            AccraPage::updateOrCreate(
                [
                    'section' => $block['section'],
                    'is_card' => 0,
                ],
                [
                    'title' => $block['title'],
                    'published' => 0,
                ]
            );
        }
    }
}

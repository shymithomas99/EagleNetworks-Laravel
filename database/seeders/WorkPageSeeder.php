<?php

namespace Database\Seeders;

use App\Models\WorkPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkPageSeeder extends Seeder
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
                'description' => 'Lorem ipsum dolor...'
            ],
            [
                'section' => 2,
                'title' => 'Lorem ipsum dolor...',
                'description' => 'Lorem ipsum dolor...'
            ],
            [
                'section' => 3,
                'title' => 'Lorem ipsum dolor...',
                'description' => 'Lorem ipsum dolor...'
            ],
            [
                'section' => 4,
                'title' => 'Lorem ipsum dolor...',
                'description' => 'Lorem ipsum dolor...'
            ],
            [
                'section' => 5,
                'title' => 'Lorem ipsum dolor...',
                'description' => 'Lorem ipsum dolor...'
            ],
            [
                'section' => 6,
                'title' => 'Lorem ipsum dolor...',
                'description' => 'Lorem ipsum dolor...'
            ],
        ];

        foreach ($blocks as $block) {
            WorkPage::updateOrCreate(
                [
                    'section' => $block['section'],
                    'is_card' => 0,
                ],
                [
                    'title' => $block['title'],
                    'description' => $block['description'],
                    'published' => 0,
                ]
            );
        }
    }
}

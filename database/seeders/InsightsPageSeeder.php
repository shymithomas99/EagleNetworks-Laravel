<?php

namespace Database\Seeders;

use App\Models\InsightsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsightsPageSeeder extends Seeder
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
                'section' => 3,
                'title' => 'Lorem ipsum dolor...',
                'description' => 'Lorem ipsum dolor...'
            ],
        ];

        foreach ($blocks as $block) {
            InsightsPage::updateOrCreate(
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

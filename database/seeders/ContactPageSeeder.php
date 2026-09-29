<?php

namespace Database\Seeders;

use App\Models\ContactPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
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
        ];

        foreach ($blocks as $block) {
            ContactPage::updateOrCreate(
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

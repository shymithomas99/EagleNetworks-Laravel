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
        ];

        foreach ($blocks as $block) {
            ContactPage::updateOrCreate(
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

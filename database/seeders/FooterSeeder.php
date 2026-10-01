<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
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
        ];

        foreach ($blocks as $block) {
            Footer::updateOrCreate(
                [
                    'section' => $block['section'],
                    'is_link' => 0,
                ],
                [
                    'published' => 0,
                ]
            );
        }
    }
}

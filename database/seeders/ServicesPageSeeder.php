<?php

namespace Database\Seeders;

use App\Models\ServicesPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServicesPage::updateOrCreate(
            ['section' => 1,
             'is_card' => 0
            ],
            [
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 2,
             'is_card' => 0
            ],
            [
                'title' => 'Our Five Integrated Services',
                'description' => 'Five integrated services designed to work together for maximum impact. Each service is built on our core methodology and delivered through our integrated team structure.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 3,
             'is_card' => 0
            ],
            [
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 4,
             'is_card' => 0
            ],
            [
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 5,
             'is_card' => 0
            ],
            [
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 7,
             'is_card' => 0
            ],
            [
                'is_card' => 0,
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 8,
             'is_card' => 0
            ],
            [
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );

        ServicesPage::updateOrCreate(
            ['section' => 9,
             'is_card' => 0
            ],
            [
                'title' => 'Services We Provide',
                'description' => 'We combine strategy, creative, technology, customer service, and media into tailored solutions for your business. Each service is designed to work together for maximum impact.',
                'published' => 1,
            ]
        );
    }
}

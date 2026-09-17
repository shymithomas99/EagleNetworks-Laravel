<?php

namespace Database\Seeders;

use App\Models\PackagesPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackagesPage::updateOrCreate(
            ['section' => 1,
             'is_card' => 0
            ],
            [
                'title' => 'Choose Your Growth Path',
                'description' => 'Three tailored packages designed for every business stage, from startups to enterprises. Each package combines strategy, creative excellence, and digital solutions to drive measurable growth and sustainable competitive advantage.',
                'published' => 1,
            ]
        );

        PackagesPage::updateOrCreate(
            ['section' => 2,
             'is_card' => 0
            ],
            [
                'title' => 'Package Selection Guide',
                'description' => "Not sure which package fits your business stage? Start here. We've designed three distinct packages to match different business needs, growth stages, and organizational complexity. Each package includes dedicated support, structured delivery, and ongoing optimization.",
                'published' => 1,
            ]
        );

        PackagesPage::updateOrCreate(
            ['section' => 3,
             'is_card' => 0
            ],
            [
                'title' => 'Our Service Packages',
                'description' => "Each package is customizable and designed to deliver measurable results. We combine strategy, creative excellence, and technology to create integrated solutions that drive business growth.",
                'published' => 1,
            ]
        );

        PackagesPage::updateOrCreate(
            ['section' => 4,
             'is_card' => 0
            ],
            [
                'title' => 'Need Something More Tailored?',
                'description' => "If your needs do not fit neatly into one package, we can create a custom engagement around your goals, market, and stage of growth. Our team specializes in designing integrated solutions that match your specific requirements and budget.",
                'published' => 1,
            ]
        );

        PackagesPage::updateOrCreate(
            ['section' => 5,
             'is_card' => 0
            ],
            [
                'title' => 'What You Get Across All Packages',
                'description' => 'Every Eagle Networks engagement includes core capabilities that ensure success. These foundational elements are consistent across all packages, providing structure, support, and measurable outcomes.',
                'published' => 1,
            ]
        );

        PackagesPage::updateOrCreate(
            ['section' => 6,
             'is_card' => 0
            ],
            [
                'short_title' => 'FAQ',
                'title' => 'Packages FAQ',
                'description' => "Common questions about Eagle London's service packages.",
                'published' => 1,
            ]
        );

        PackagesPage::updateOrCreate(
            ['section' => 7,
             'is_card' => 0
            ],
            [
                'title' => 'Ready to Grow?',
                'description' => "Partner with us to unlock your brand's full potential in 2026 and beyond.",
                'published' => 1,
            ]
        );
    }
}

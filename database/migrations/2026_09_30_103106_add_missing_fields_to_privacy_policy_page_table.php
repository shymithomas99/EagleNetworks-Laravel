<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('privacy_policy_page', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            |
            | Used for:
            | <meta name="description">
            |
            */

            $table->text('meta_description')
                ->nullable()
                ->after('description');


            /*
            |--------------------------------------------------------------------------
            | Flexible Content Blocks
            |--------------------------------------------------------------------------
            |
            | Used for sections containing multiple individually formatted
            | content items.
            |
            | Section 4:
            | - Communication
            | - Service Delivery
            | - Analytics
            |
            | Section 6:
            | - Hosting providers
            | - Analytics providers
            |
            */

            $table->json('content_blocks')
                ->nullable()
                ->after('key_points');


            /*
            |--------------------------------------------------------------------------
            | Post Details
            |--------------------------------------------------------------------------
            |
            | Used by:
            |
            | Effective Date
            | Data Controller
            | Regulatory Framework
            |
            */

            $table->string('effective_date')
                ->nullable()
                ->after('quote_author');

            $table->string('data_controller')
                ->nullable()
                ->after('effective_date');

            $table->string('regulatory_framework')
                ->nullable()
                ->after('data_controller');


            /*
            |--------------------------------------------------------------------------
            | CTA - Button 2
            |--------------------------------------------------------------------------
            */

            $table->string('button_text_2')
                ->nullable()
                ->after('button_url');

            $table->string('button_url_2')
                ->nullable()
                ->after('button_text_2');


            /*
            |--------------------------------------------------------------------------
            | CTA - Button 3
            |--------------------------------------------------------------------------
            */

            $table->string('button_text_3')
                ->nullable()
                ->after('button_url_2');

            $table->string('button_url_3')
                ->nullable()
                ->after('button_text_3');


            /*
            |--------------------------------------------------------------------------
            | Inner Bottom Menu Text
            |--------------------------------------------------------------------------
            |
            | Example:
            |
            | Eagle Networks — International creative, marketing and
            | technology agency.
            |
            */

            $table->text('footer_text')
                ->nullable()
                ->after('button_url_3');


            /*
            |--------------------------------------------------------------------------
            | Inner Bottom Menu Items
            |--------------------------------------------------------------------------
            |
            | Example:
            |
            | [
            |     {
            |         "label": "Our Services",
            |         "url": "/services",
            |         "active": true
            |     },
            |     {
            |         "label": "Contact Us",
            |         "url": "/contact",
            |         "active": false
            |     },
            |     {
            |         "label": "Terms of Use",
            |         "url": "/terms",
            |         "active": false
            |     },
            |     {
            |         "label": "About Us",
            |         "url": "/about",
            |         "active": false
            |     }
            | ]
            |
            */

            $table->json('menu_items')
                ->nullable()
                ->after('footer_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('privacy_policy_page', function (Blueprint $table) {
            $table->dropColumn([
                'meta_description',
                'content_blocks',
                'effective_date',
                'data_controller',
                'regulatory_framework',
                'button_text_2',
                'button_url_2',
                'button_text_3',
                'button_url_3',
                'footer_text',
                'menu_items',
            ]);
        });
    }
};

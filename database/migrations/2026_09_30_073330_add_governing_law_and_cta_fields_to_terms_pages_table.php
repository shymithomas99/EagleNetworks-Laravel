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
        Schema::table('terms_pages', function (Blueprint $table) {
            /*
            |--------------------------------------------------------------------------
            | Governing Law - Section 9
            |--------------------------------------------------------------------------
            */

            $table->string('contact_question')
                ->nullable()
                ->after('additional_description');

            $table->string('contact_email')
                ->nullable()
                ->after('contact_question');

            $table->text('contact_address')
                ->nullable()
                ->after('contact_email');

            $table->string('effective_date')
                ->nullable()
                ->after('contact_address');

            $table->string('operator')
                ->nullable()
                ->after('effective_date');

            $table->string('governing_law')
                ->nullable()
                ->after('operator');


            /*
            |--------------------------------------------------------------------------
            | CTA Banner - Section 10
            |--------------------------------------------------------------------------
            */

            $table->string('button_text_2')
                ->nullable()
                ->after('button_url');

            $table->string('button_url_2')
                ->nullable()
                ->after('button_text_2');

            $table->string('button_text_3')
                ->nullable()
                ->after('button_url_2');

            $table->string('button_url_3')
                ->nullable()
                ->after('button_text_3');



            $table->text('footer_text')
                ->nullable()
                ->after('button_url_3');

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
        Schema::table('terms_pages', function (Blueprint $table) {
            $table->dropColumn([
                'contact_question',
                'contact_email',
                'contact_address',
                'effective_date',
                'operator',
                'governing_law',

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

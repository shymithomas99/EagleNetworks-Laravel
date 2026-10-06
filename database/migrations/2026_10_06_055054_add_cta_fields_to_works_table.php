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
        Schema::table('works', function (Blueprint $table) {
            $table->string('cta_title', 512)->nullable()->after('additionalContent');
            $table->text('cta_description')->nullable()->after('cta_title');

            $table->string('cta_button_text', 255)->nullable()->after('cta_description');
            $table->string('cta_button_url', 512)->nullable()->after('cta_button_text');

            $table->string('cta_button_text_2', 255)->nullable()->after('cta_button_url');
            $table->string('cta_button_url_2', 512)->nullable()->after('cta_button_text_2');

            $table->string('cta_button_text_3', 255)->nullable()->after('cta_button_url_2');
            $table->string('cta_button_url_3', 512)->nullable()->after('cta_button_text_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn([
                'cta_title',
                'cta_description',
                'cta_button_text',
                'cta_button_url',
                'cta_button_text_2',
                'cta_button_url_2',
                'cta_button_text_3',
                'cta_button_url_3',
            ]);
        });
    }
};
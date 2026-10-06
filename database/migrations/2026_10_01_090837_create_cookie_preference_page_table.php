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
        Schema::create('cookie_preference_page', function (Blueprint $table) {
            $table->id();
            // Modal header
            $table->string('title')->nullable();

            // Intro text
            $table->text('description')->nullable();
            $table->string('privacy_policy_text')->nullable();
            $table->string('privacy_policy_url')->nullable();

            // Essential cookies
            $table->string('essential_title')->nullable();
            $table->string('essential_badge')->nullable();
            $table->text('essential_description')->nullable();

            // Analytics cookies
            $table->string('analytics_title')->nullable();
            $table->text('analytics_description')->nullable();

            // Footer buttons
            $table->string('reject_button_text')->nullable();
            $table->string('accept_button_text')->nullable();
            $table->string('save_button_text')->nullable();

            // Status
            $table->boolean('published')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookie_preference_page');
    }
};
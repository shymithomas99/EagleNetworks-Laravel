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
        Schema::create('terms_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('section');
            $table->boolean('is_card')->default(false);

            $table->text('intro')->nullable();

            $table->string('label')->nullable();
            $table->string('title')->nullable();

            $table->text('description')->nullable();
            $table->text('additional_description')->nullable();

            $table->string('location')->nullable();
            $table->string('serving')->nullable();

            $table->text('primary_focus')->nullable();
            $table->text('key_offerings')->nullable();
            $table->text('key_points')->nullable();

            $table->text('quote')->nullable();
            $table->string('quote_author')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            $table->boolean('published')->default(false);
            $table->integer('display_order')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_pages');
    }
};
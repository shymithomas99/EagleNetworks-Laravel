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
        Schema::create('media_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('section');
            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('additional_description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_text_2')->nullable();
            $table->string('button_url_2')->nullable();
            $table->string('button_text_3')->nullable();
            $table->string('button_url_3')->nullable();
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
        Schema::dropIfExists('media_pages');
    }
};
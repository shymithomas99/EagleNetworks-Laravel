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
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('section');
            $table->boolean('is_card');
            $table->string('label')->nullable();
            $table->string('image')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('tag_1')->nullable();
            $table->string('tag_2')->nullable();
            $table->string('tag_3')->nullable();
            $table->text('additional_description')->nullable();
            $table->unsignedTinyInteger('rating')->default(0);
            $table->text('testimonial')->nullable();
            $table->string('client_name')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_url')->nullable();
            $table->string('button1_text')->nullable();
            $table->string('button1_url')->nullable();
            $table->string('button2_text')->nullable();
            $table->string('button2_url')->nullable();
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
        Schema::dropIfExists('home_page');
    }
};

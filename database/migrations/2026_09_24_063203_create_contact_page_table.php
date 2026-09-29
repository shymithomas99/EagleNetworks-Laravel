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
        Schema::create('contact_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('section');
            $table->boolean('is_card');
            $table->string('label')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('tag_1')->nullable();
            $table->string('tag_2')->nullable();
            $table->string('tag_3')->nullable();
            $table->string('location')->nullable();
            $table->string('company_name')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('email')->nullable();
            $table->text('map_url')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('x')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('contact_page');
    }
};

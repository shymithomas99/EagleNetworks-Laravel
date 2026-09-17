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
        Schema::create('services_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('section');
            $table->boolean('is_card');
            $table->string('short_title')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('button1_text')->nullable();
            $table->string('button1_url')->nullable();
            $table->string('button2_text')->nullable();
            $table->string('button2_url')->nullable();
            $table->string('link_text')->nullable();
            $table->string('link_url')->nullable();
            $table->text('key_services')->nullable();
            $table->text('key_points')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('featured')->nullable();
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
        Schema::dropIfExists('services_page');
    }
};

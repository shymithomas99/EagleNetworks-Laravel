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
        Schema::create('packages_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('section');
            $table->boolean('is_card');
            $table->string('title');
            $table->string('support_title')->nullable();
            $table->string('short_title')->nullable();
            $table->text('description');
            $table->text('support_description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->text('key_services')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('featured')->nullable();
            $table->boolean('most_popular')->nullable();
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
        Schema::dropIfExists('packages_page');
    }
};

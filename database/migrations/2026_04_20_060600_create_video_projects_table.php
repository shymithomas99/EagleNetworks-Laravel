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
        Schema::create('video_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('client_name')->nullable();
            // ✅ dynamic category instead of ENUM
            $table->foreignId('category_id')
                ->constrained('video_categories')
                ->cascadeOnDelete();
            $table->text('video_url'); // YouTube/Vimeo only
            $table->text('thumbnail_url')->nullable();
            $table->string('thumbnail_key')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('video_projects');
    }
};
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 512);
            $table->string('slug', 512)->unique()->comment('URL identifier, e.g. why-brand-strategy-matters');
            $table->string('author', 255)->default('Eagle London');
            $table->foreignId('category_id')->constrained('blog_categories');
            $table->text('coverImage')->nullable();
            $table->text('coverImageUrl')->nullable();
            $table->string('coverImageKey', 512)->nullable()->comment('S3 key for deletion');
            $table->text('excerpt')->nullable()->comment('Short summary shown on listing page');
            $table->text('body')->comment('Full HTML body'); // NOT NULL
            $table->boolean('published')->default(false)->comment('Controls public visibility');
            $table->timestamp('publishedAt')->nullable()->comment('Set when first published');
            $table->string('seoTitle', 512)->nullable()->comment('Optional SEO title override');
            $table->text('seoDescription')->nullable()->comment('Optional SEO description override');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

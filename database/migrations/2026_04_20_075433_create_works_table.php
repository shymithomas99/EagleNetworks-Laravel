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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title', 512);
            $table->string('slug', 512)->unique()->comment('URL identifier, e.g. acca-brand-refresh');
            $table->string('clientName', 255);
            $table->foreignId('category_id')->constrained('work_categories');
            $table->text('coverImageUrl')->nullable()->comment('CDN URL of cover/card image');
            $table->string('coverImageKey', 512)->nullable()->comment('S3 key');
            $table->text('heroImageUrl')->nullable()->comment('CDN URL of full-width hero image');
            $table->string('heroImageKey', 512)->nullable()->comment('S3 key');
            $table->text('excerpt')->nullable()->comment('Short summary for listing card');
            $table->text('servicesDelivered')->nullable()->comment('Comma-separated or JSON list');
            $table->string('industry', 128)->nullable()->comment('Client industry sector');
            $table->string('projectYear', 10)->nullable()->comment('e.g. 2024');
            $table->text('brief')->nullable()->comment('The Brief section body');
            $table->text('approach')->nullable()->comment('The Approach section body');
            $table->text('results')->nullable()->comment('The Results section body');
            $table->text('keyMetrics')->nullable()->comment('JSON array of metric objects [{label, value}]');
            $table->text('testimonial')->nullable()->comment('Pull quote from client');
            $table->string('testimonialAuthor', 255)->nullable()->comment('Name and title of quote author');
            $table->text('additionalContent')->nullable();
            $table->boolean('featured')->default(false)->comment('Show in featured/hero position');
            $table->boolean('published')->default(false)->comment('Controls public visibility');
            $table->integer('displayOrder')->default(0)->comment('Manual sort order');
            $table->string('seoTitle', 512)->nullable()->comment('Optional SEO title override');
            $table->text('seoDescription')->nullable()->comment('Optional SEO description override');
            $table->timestamp('publishedAt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};

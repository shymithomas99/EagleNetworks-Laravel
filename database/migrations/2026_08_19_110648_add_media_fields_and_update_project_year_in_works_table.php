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
        Schema::table('works', function (Blueprint $table) {
            // Media fields
            $table->unsignedTinyInteger('briefMediaType')->nullable()->after('brief')->comment('1 = Brief Image, 2 = Brief Video URL');;
            $table->string('briefImage')->nullable()->after('briefMediaType');
            $table->string('briefVideoUrl')->nullable()->after('briefImage');

            // Change project year length
            $table->string('projectYear')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->string('projectYear', 10)->nullable()->change();
            $table->dropColumn([
                'briefMediaType',
                'briefImage',
                'briefVideoUrl',
            ]);
        });
    }
};

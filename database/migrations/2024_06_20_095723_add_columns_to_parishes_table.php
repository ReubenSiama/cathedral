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
        Schema::table('parishes', function (Blueprint $table) {
            $table->string('banner')->nullable();
            $table->longText('about')->nullable();
            $table->string('address')->nullable();
            $table->text('short_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parishes', function (Blueprint $table) {
            $table->dropIfExists('banner');
            $table->dropIfExists('about');
            $table->dropIfExists('address');
            $table->dropIfExists('short_description');
        });
    }
};

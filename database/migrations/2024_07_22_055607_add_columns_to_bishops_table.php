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
        Schema::table('bishops', function (Blueprint $table) {
            $table->boolean('is_deceased')->default(false);
            $table->boolean('display')->default(false);
            $table->integer('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bishops', function (Blueprint $table) {
            $table->dropColumn('is_deceased');
            $table->dropColumn('display');
            $table->dropColumn('order');
        });
    }
};

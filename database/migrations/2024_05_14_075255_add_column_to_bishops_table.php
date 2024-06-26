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
            $table->string('image')->nullable();
            $table->boolean('is_current')->default(false);
            $table->text('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bishops', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('is_current');
            $table->dropColumn('bio');
        });
    }
};

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
        Schema::table('marriages', function (Blueprint $table) {
            $table->string('nuptial_form')->nullable()->change();
            $table->string('impediment_dispensation')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marriages', function (Blueprint $table) {
            $table->string('nuptial_form')->change();
            $table->string('impediment_dispensation')->change();
        });
    }
};

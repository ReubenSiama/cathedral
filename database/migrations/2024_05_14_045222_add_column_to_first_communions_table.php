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
        Schema::table('first_communions', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Parish::class, 'place_of_baptism')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('first_communions', function (Blueprint $table) {
            $table->string('place_of_baptism')->change();
        });
    }
};

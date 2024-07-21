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
        Schema::create('priest_in_parishes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('image')->nullable();
            $table->date('from');
            $table->date('to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priest_in_parishes');
    }
};

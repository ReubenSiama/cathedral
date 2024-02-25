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
        Schema::create('confirmations', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->integer('number');
            $table->string('confirmation_number')->virtualAs('CONCAT(number, "/", year)');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_surname')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_surname')->nullable();
            $table->string('domicile');
            $table->foreignIdFor(\App\Models\Parish::class);
            $table->date('confirmation_date');
            $table->foreignIdFor(\App\Models\Bishop::class);
            $table->string('sponsor')->nullable();
            $table->text('remarks')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('place_of_confirmation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmations');
    }
};

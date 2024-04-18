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
            $table->string('number');
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
            $table->string('sponsor_1')->nullable();
            $table->string('sponsor_2')->nullable();
            $table->text('remarks')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('place_of_confirmation');
            $table->date('date_of_issue')->nullable();
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

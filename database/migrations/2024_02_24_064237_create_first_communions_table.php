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
        Schema::create('first_communions', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name');
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_baptism')->nullable();
            $table->string('place_of_baptism')->nullable();
            $table->string('surname')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_surname')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_surname')->nullable();
            $table->foreignIdFor(\App\Models\Parish::class);
            $table->date('date_of_first_communion');
            $table->string('address');
            $table->text('remarks')->nullable();
            $table->string('date_of_issue')->nullable();
            $table->foreignIdFor(\App\Models\Priest::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_communions');
    }
};

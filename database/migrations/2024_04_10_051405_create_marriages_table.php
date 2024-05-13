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
        Schema::create('marriages', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date_of_marriage');
            $table->foreignIdFor(\App\Models\Parish::class);
            $table->date('date_of_first_announcement');
            $table->date('date_of_second_announcement');
            $table->date('date_of_third_announcement');
            $table->string('impediment_dispensation');
            $table->foreignIdFor(\App\Models\Priest::class);
            $table->foreignId('parish_priest_id');
            $table->string('nuptial_form');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriages');
    }
};

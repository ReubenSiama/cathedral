<?php

use App\Models\Nationality;
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
        Schema::create('baptisms', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('number');
            $table->date('date_of_baptism');
            $table->date('date_of_birth');
            $table->boolean('is_infant');
            $table->integer('age')->nullable();
            $table->string('place_of_birth');
            $table->string('name');
            $table->string('surname');
            $table->string('gender');
            $table->string('father_name')->nullable();
            $table->string('father_surname')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_surname')->nullable();
            $table->foreignIdFor(Nationality::class)->nullable();
            $table->string('parents_domicile');
            $table->string('father_occupation')->nullable();
            $table->string('god_father')->nullable();
            $table->string('god_mother')->nullable();
            $table->string('place_of_baptism');
            $table->foreignIdFor(\App\Models\Priest::class)->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptisms');
    }
};

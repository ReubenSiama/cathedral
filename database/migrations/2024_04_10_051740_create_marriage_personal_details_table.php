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
        Schema::create('marriage_personal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Marriage::class);
            $table->string('type')->comment('bride or bridegroom');
            $table->string('name');
            $table->string('surname');
            $table->string('father');
            $table->string('mother');
            $table->date('date_of_birth');
            $table->foreignIdFor(\App\Models\Nationality::class);
            $table->string('domicile');
            $table->string('occupation');
            $table->boolean('is_married')->default(false);
            $table->string('signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_personal_details');
    }
};

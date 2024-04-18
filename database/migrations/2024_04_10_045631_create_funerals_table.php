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
        Schema::create('funerals', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('relationship');
            $table->string('parent_spouse_name')->nullable();
            $table->string('age')->nullable();
            $table->string('domicile')->nullable();
            $table->date('date_of_death');
            $table->date('date_of_burial');
            $table->string('cause_of_death')->nullable();
            $table->string('cve_or_infants');
            $table->string('place_of_burial')->nullable();
            $table->foreignIdFor(\App\Models\Priest::class);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funerals');
    }
};

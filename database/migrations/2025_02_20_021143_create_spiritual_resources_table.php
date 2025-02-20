<?php

use App\Models\SpiritualResourceCategory;
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
        Schema::create('spiritual_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SpiritualResourceCategory::class)->constrained()->cascadeOnDelete();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spiritual_resources');
    }
};

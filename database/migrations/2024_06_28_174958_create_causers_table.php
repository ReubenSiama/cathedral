<?php

use App\Models\User;
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
        Schema::create('causers', function (Blueprint $table) {
            $table->id();
            $table->morphs('modelable');
            $table->foreignIdFor(User::class)->cascadeOnDelete()
                ->comment('The user who caused the action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causers');
    }
};

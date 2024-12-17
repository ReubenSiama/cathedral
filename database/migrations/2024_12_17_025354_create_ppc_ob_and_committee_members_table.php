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
        Schema::create('ppc_ob_and_committee_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppc_ob_and_committee_id')->constrained();
            $table->string('role');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppc_ob_and_committee_members');
    }
};

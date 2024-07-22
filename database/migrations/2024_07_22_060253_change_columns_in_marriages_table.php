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
        Schema::table('marriages', function (Blueprint $table) {
            $table->date('date_of_first_announcement')->nullable()->change();
            $table->date('date_of_second_announcement')->nullable()->change();
            $table->date('date_of_third_announcement')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('marriages', function (Blueprint $table) {
            $table->date('date_of_first_announcement')->change();
            $table->date('date_of_second_announcement')->change();
            $table->date('date_of_third_announcement')->change();
        });
    }
};

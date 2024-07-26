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
        // Schema::table('settings', function (Blueprint $table) {
        //     $table->dropColumn('description');
        //     $table->dropColumn('value');
        // });

        // Schema::table('association_branches', function (Blueprint $table) {
        //     $table->dropColumn('description');
        // });

        // Schema::table('institutions', function (Blueprint $table) {
        //     $table->dropColumn('description');
        // });

        Schema::table('parishes', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('short_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};

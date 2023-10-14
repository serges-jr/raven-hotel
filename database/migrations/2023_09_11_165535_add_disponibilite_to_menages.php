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
        Schema::table('menages', function (Blueprint $table) {
            $table->boolean('disponibilite')->default(1);
            $table->boolean('menage')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menages', function (Blueprint $table) {
            $table->dropColumn('disponibilite');
            $table->dropColumn('menage');
        });
    }
};

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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname');
            $table->string('adresse');
            $table->integer('phone');
            $table->boolean('sexe');
            $table->date('date');
            $table->string('avatar')->nullable();
            $table->string('fonction')->nullable();
            $table->integer('salaire')->nullable();
            $table->date('dateEmbauche')->nullable();
            $table->string('role')->default('client');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('adresse');
            $table->dropColumn('phone');
            $table->dropColumn('sexe');
            $table->dropColumn('date');
            $table->dropColumn('avatar');
            $table->dropColumn('fonction');
            $table->dropColumn('salaire');
            $table->dropColumn('dateEmbauche');
            $table->dropColumn('role');
        });
    }
};

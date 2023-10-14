<?php

use App\Models\Chambre;
use App\Models\Equipment;
use App\Models\Feature;
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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('surface');
            $table->integer('capacite');
            $table->integer('adulte');
            $table->integer('enfant');
            $table->integer('prix');
            $table->longText('description');
            $table->boolean('status')->default('0');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('feature_chambre', function (Blueprint $table) {
            $table->foreignIdFor(Feature::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Chambre::class)->constrained()->cascadeOnDelete();
            $table->primary(['feature_id','chambre_id']);
        });
        Schema::create('equipment_chambre', function (Blueprint $table) {
            $table->foreignIdFor(Equipment::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Chambre::class)->constrained()->cascadeOnDelete();
            $table->primary(['equipment_id','chambre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
        Schema::dropIfExists('feature_chambre');
        Schema::dropIfExists('equipment_chambre');
    }
};

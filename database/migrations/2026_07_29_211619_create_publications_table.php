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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->json('titre');
            $table->json('contenu');
            $table->string('langue_origine', 5)->default('fr');
            $table->json('images')->nullable();
            $table->json('videos')->nullable();
            $table->string('statut')->default('brouillon');
            $table->timestamp('publie_le')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
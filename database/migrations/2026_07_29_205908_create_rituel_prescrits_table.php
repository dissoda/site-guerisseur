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
        Schema::create('rituels_prescrits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained()->cascadeOnDelete();
            $table->string('origine')->default('guerisseur');
            $table->text('notes_guerisseur')->nullable();
            $table->text('coordonnees_paiement')->nullable();
            $table->decimal('montant_total', 10, 2)->default(0);
            $table->string('statut')->default('en_attente_redaction');
            $table->timestamp('envoye_le')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rituels_prescrits');
    }
};
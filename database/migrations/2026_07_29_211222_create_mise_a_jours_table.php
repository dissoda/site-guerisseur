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
        Schema::create('mises_a_jour', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rituel_prescrit_id')->constrained('rituels_prescrits')->cascadeOnDelete();
            $table->text('message')->nullable();
            $table->json('images')->nullable();
            $table->timestamp('envoyee_le')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mises_a_jour');
    }
};
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
        Schema::table('rituels_prescrits', function (Blueprint $table) {
            $table->string('langue_origine', 5)->default('fr')->after('dossier_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rituels_prescrits', function (Blueprint $table) {
            $table->dropColumn('langue_origine');
        });
    }
};
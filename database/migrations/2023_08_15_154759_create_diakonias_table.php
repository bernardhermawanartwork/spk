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
        Schema::create('diakonias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_diakonia');
            $table->string('jenis_bantuan');
            $table->float('nilai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diakonias');
    }
};

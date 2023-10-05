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
        Schema::create('keaktifans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_jemaat');
            $table->float('persentase_keaktifan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keaktifans');
    }
};

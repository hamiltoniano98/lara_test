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
        Schema::create('cao_bonus', function (Blueprint $table) {
            $table->integer('bon_categoria')->default(0);
            $table->integer('bon_inicio')->default(0);
            $table->integer('bon_fim')->default(0);
            $table->float('bon_valor_sem')->nullable();
            $table->float('bon_valor_fimsem')->nullable();

            $table->primary(['bon_categoria', 'bon_inicio', 'bon_fim']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_bonus');
    }
};

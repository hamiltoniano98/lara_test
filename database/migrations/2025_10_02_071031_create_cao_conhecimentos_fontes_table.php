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
        Schema::create('cao_conhecimentos_fontes', function (Blueprint $table) {
            $table->integer('idfonte', true);
            $table->integer('idconhecimento')->default(0)->index('idconhecimento');
            $table->dateTime('datahora')->default('2000-01-01 00:00:00');
            $table->string('arquivo', 50)->default('');
            $table->string('caminho', 50)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_conhecimentos_fontes');
    }
};

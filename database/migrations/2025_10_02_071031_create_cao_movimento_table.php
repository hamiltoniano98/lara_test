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
        Schema::create('cao_movimento', function (Blueprint $table) {
            $table->bigIncrements('co_movimento')->index('co_movimento');
            $table->string('co_usuario', 50)->default('');
            $table->dateTime('dt_entrada')->default('2000-01-01 00:00:00');
            $table->dateTime('dt_saida_almoco')->default('2000-01-01 00:00:00');
            $table->dateTime('dt_volta_almoco')->default('2000-01-01 00:00:00');
            $table->dateTime('dt_saida')->default('2000-01-01 00:00:00');
            $table->unsignedTinyInteger('is_encerrado')->default(0);

            $table->primary(['co_movimento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_movimento');
    }
};

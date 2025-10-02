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
        Schema::create('cao_movimento_os', function (Blueprint $table) {
            $table->integer('co_movimento_os', true);
            $table->integer('nu_os')->default(0);
            $table->bigInteger('co_sistema')->default(0);
            $table->bigInteger('co_tipo_movimento')->nullable();
            $table->bigInteger('nu_valor')->nullable();
            $table->longText('ds_valor')->nullable();
            $table->string('usuario_obs', 30)->nullable();
            $table->dateTime('dt_ini')->nullable();
            $table->dateTime('dt_fim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_movimento_os');
    }
};

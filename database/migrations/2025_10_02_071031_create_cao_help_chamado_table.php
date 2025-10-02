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
        Schema::create('cao_help_chamado', function (Blueprint $table) {
            $table->integer('co_chamado', true)->index('co_chamado');
            $table->text('ds_chamado');
            $table->text('ds_solucao')->nullable();
            $table->tinyInteger('co_status')->default(0);
            $table->integer('co_motivo')->default(0);
            $table->integer('co_tela')->default(0);
            $table->integer('co_autor')->default(0);
            $table->integer('co_filial')->default(0);
            $table->bigInteger('co_sistema')->default(0);
            $table->date('dt_chamado')->default('2000-01-01');
            $table->date('dt_solucao')->nullable();

            $table->primary(['co_chamado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_help_chamado');
    }
};

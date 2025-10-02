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
        Schema::create('cao_atividade_report', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('co_cliente')->default(0);
            $table->string('inicio', 30)->nullable();
            $table->string('fim', 30)->nullable();
            $table->string('lembrete', 50)->nullable();
            $table->integer('co_atividade')->default(0);
            $table->integer('co_os')->default(0);
            $table->string('assunto', 60)->nullable();
            $table->text('conteudo')->nullable();
            $table->string('status', 20)->default('');
            $table->string('tempo', 30)->nullable();
            $table->string('co_usuario', 50)->default('');
            $table->dateTime('data_ativ')->default('2000-01-01 00:00:00');
            $table->text('retorno');
            $table->integer('co_fase')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_atividade_report');
    }
};

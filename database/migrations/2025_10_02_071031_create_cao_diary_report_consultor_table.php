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
        Schema::create('cao_diary_report_consultor', function (Blueprint $table) {
            $table->comment('contem informacoes referentes a agendamento, visita, elabora');
            $table->integer('co_diary_report_consultor', true);
            $table->integer('co_movimento')->default(0);
            $table->integer('co_atividade')->default(0);
            $table->mediumText('ds_empresa');
            $table->mediumText('ds_assunto');
            $table->dateTime('dt_agendamento')->default('2000-01-01 00:00:00');
            $table->dateTime('dt_agendamento_fim')->nullable();
            $table->float('vl_fechamento')->unsigned()->default(0);
            $table->bigInteger('co_cliente')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_diary_report_consultor');
    }
};

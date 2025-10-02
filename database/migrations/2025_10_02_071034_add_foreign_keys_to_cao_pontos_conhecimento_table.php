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
        Schema::table('cao_pontos_conhecimento', function (Blueprint $table) {
            $table->foreign(['pontuacao'], 'cao_pontos_conhecimento_ibfk_1')->references(['idescala'])->on('cao_escala_ranking')->onUpdate('cascade')->onDelete('no action');
            $table->foreign(['co_coordenador'], 'cao_pontos_conhecimento_ibfk_2')->references(['co_usuario'])->on('cao_usuario')->onUpdate('cascade')->onDelete('no action');
            $table->foreign(['idconhecimento'], 'cao_pontos_conhecimento_ibfk_3')->references(['idconhecimento'])->on('cao_conhecimentos')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cao_pontos_conhecimento', function (Blueprint $table) {
            $table->dropForeign('cao_pontos_conhecimento_ibfk_1');
            $table->dropForeign('cao_pontos_conhecimento_ibfk_2');
            $table->dropForeign('cao_pontos_conhecimento_ibfk_3');
        });
    }
};

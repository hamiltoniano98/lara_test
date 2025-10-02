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
        Schema::create('permissao_sistema', function (Blueprint $table) {
            $table->string('co_usuario', 20)->default('');
            $table->unsignedBigInteger('co_tipo_usuario')->default(0);
            $table->unsignedBigInteger('co_sistema')->default(0);
            $table->char('in_ativo', 1)->default('S');
            $table->string('co_usuario_atualizacao', 20)->nullable();
            $table->dateTime('dt_atualizacao')->default('2000-01-01 00:00:00');

            $table->index(['co_usuario', 'co_tipo_usuario', 'co_sistema', 'dt_atualizacao'], 'co_usuario');
            $table->primary(['co_usuario', 'co_tipo_usuario', 'co_sistema']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissao_sistema');
    }
};

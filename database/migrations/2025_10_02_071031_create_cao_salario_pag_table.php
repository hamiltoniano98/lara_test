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
        Schema::create('cao_salario_pag', function (Blueprint $table) {
            $table->integer('id_pagamento', true)->index('id_pagamento');
            $table->string('co_usuario', 20)->default('');
            $table->date('dt_efetuado')->default('2000-01-01');
            $table->enum('status', ['Autorizado', 'Pago', 'Pendente'])->default('Pendente');
            $table->text('observacao')->nullable();

            $table->unique(['co_usuario', 'dt_efetuado'], 'unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_salario_pag');
    }
};

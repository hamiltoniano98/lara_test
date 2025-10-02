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
        Schema::create('cao_banco_de_horas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('co_usuario')->default('');
            $table->date('data_cadastro')->default('2000-01-01');
            $table->integer('segundos')->default(0);
            $table->string('tipo', 10)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_banco_de_horas');
    }
};

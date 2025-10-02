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
        Schema::create('cao_fatura', function (Blueprint $table) {
            $table->increments('co_fatura');
            $table->integer('co_cliente')->default(0);
            $table->integer('co_sistema')->default(0);
            $table->integer('co_os')->default(0);
            $table->integer('num_nf')->default(0);
            $table->float('total')->default(0);
            $table->float('valor')->default(0);
            $table->date('data_emissao')->default('2000-01-01');
            $table->text('corpo_nf');
            $table->float('comissao_cn')->default(0);
            $table->float('total_imp_inc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_fatura');
    }
};

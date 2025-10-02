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
        Schema::create('cao_fatura_pag', function (Blueprint $table) {
            $table->integer('id_fatura_pag', true);
            $table->integer('co_fatura')->default(0)->unique('co_fatura');
            $table->date('dt_efetuado')->default('2000-01-01');
            $table->float('valor_pago')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_fatura_pag');
    }
};

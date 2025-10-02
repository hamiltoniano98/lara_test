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
        Schema::create('cao_banco_horas', function (Blueprint $table) {
            $table->comment('Banco de horas dos usuários...');
            $table->increments('co_banc_horas');
            $table->string('co_usuario', 20)->default('');
            $table->string('periodo', 7)->default('');
            $table->integer('min_mes')->default(0);
            $table->integer('min_ferias')->default(0);
            $table->integer('min_pago')->default(0);
            $table->integer('min_total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_banco_horas');
    }
};

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
        Schema::create('cao_salario', function (Blueprint $table) {
            $table->string('co_usuario', 20)->default('');
            $table->date('dt_alteracao')->default('2000-01-01');
            $table->float('brut_salario')->default(0);
            $table->float('liq_salario')->default(0);

            $table->primary(['co_usuario', 'dt_alteracao']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_salario');
    }
};

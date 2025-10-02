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
        Schema::create('cao_dr_ativ_comp', function (Blueprint $table) {
            $table->integer('id_ativ_comp', true);
            $table->string('co_usuario', 20)->default('')->index('co_usuario');
            $table->date('data')->default('2000-01-01');
            $table->text('assunto');
            $table->time('tempo_gasto')->default('00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_dr_ativ_comp');
    }
};

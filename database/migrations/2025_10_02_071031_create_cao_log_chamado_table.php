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
        Schema::create('cao_log_chamado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('co_chamado')->default(0);
            $table->dateTime('dt_chamado')->default('2000-01-01 00:00:00');
            $table->string('co_usuario', 128)->default('');
            $table->integer('co_daily')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_log_chamado');
    }
};

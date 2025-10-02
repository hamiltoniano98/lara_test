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
        Schema::create('cao_os_obs_chamado', function (Blueprint $table) {
            $table->integer('co_obs', true);
            $table->integer('co_chamado')->nullable()->default(0);
            $table->string('co_usuario', 80)->nullable()->default('0');
            $table->text('descricao')->nullable();
            $table->dateTime('dt_obs')->nullable()->default('2000-01-01 00:00:00');
            $table->string('email')->nullable();
            $table->string('arquivo_obs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_os_obs_chamado');
    }
};

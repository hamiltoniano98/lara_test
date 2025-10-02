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
        Schema::create('cao_obs_cliente', function (Blueprint $table) {
            $table->increments('co_obs');
            $table->string('descricao', 250)->default('');
            $table->unsignedInteger('co_cliente')->default(0);
            $table->string('co_usuario', 30)->nullable()->default('');
            $table->dateTime('dt_obs')->nullable()->default('2000-01-01 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_obs_cliente');
    }
};

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
        Schema::create('cao_ombudsman', function (Blueprint $table) {
            $table->integer('id', true);
            $table->tinyInteger('idtipo')->default(0)->index('idtipo');
            $table->tinyInteger('idcategoria')->default(0)->index('idcategoria');
            $table->dateTime('data')->default('2000-01-01 00:00:00');
            $table->text('comentario');
            $table->tinyInteger('co_escritorio')->default(0)->index('co_escritorio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_ombudsman');
    }
};

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
        Schema::create('cao_ramo', function (Blueprint $table) {
            $table->comment('Ramo de atividade de Clientes');
            $table->bigIncrements('co_ramo');
            $table->string('ds_ramo', 60)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_ramo');
    }
};

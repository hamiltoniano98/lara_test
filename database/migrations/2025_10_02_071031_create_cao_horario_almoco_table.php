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
        Schema::create('cao_horario_almoco', function (Blueprint $table) {
            $table->string('co_usuario')->default('');
            $table->string('almoco_saida_hora', 128)->default('0');
            $table->string('almoco_volta_hora', 128)->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_horario_almoco');
    }
};

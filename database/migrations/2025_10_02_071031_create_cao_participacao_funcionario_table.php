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
        Schema::create('cao_participacao_funcionario', function (Blueprint $table) {
            $table->increments('co_part_funcionario');
            $table->float('pc_participacao')->unsigned()->default(0);
            $table->string('co_usuario', 20)->default('');
            $table->unsignedTinyInteger('co_escritorio')->default(0);
            $table->date('dt_referencia')->default('2000-01-01');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_participacao_funcionario');
    }
};

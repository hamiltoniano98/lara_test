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
        Schema::create('cao_atividade_consultor', function (Blueprint $table) {
            $table->integer('co_atividade', true);
            $table->string('ds_atividade', 50)->default('');
            $table->char('ativo', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_atividade_consultor');
    }
};

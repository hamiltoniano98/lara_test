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
        Schema::create('cao_documentacao_casos_uso', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome', 70)->default('');
            $table->integer('co_sistema')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_documentacao_casos_uso');
    }
};

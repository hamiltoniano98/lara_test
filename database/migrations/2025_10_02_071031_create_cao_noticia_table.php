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
        Schema::create('cao_noticia', function (Blueprint $table) {
            $table->integer('co_noticia', true);
            $table->string('assunto')->default('');
            $table->text('descricao');
            $table->string('foto')->default('');
            $table->string('co_usuario', 60)->default('');
            $table->dateTime('dt_noticia')->default('2000-01-01 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_noticia');
    }
};

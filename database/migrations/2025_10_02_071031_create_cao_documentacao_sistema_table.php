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
        Schema::create('cao_documentacao_sistema', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('co_sistema')->default(0);
            $table->text('descricao')->nullable();
            $table->string('pasta', 30)->default('');
            $table->integer('sub_grupo')->nullable();
            $table->string('co_usuario', 60)->default('');
            $table->dateTime('dt_doc')->default('2000-01-01 00:00:00');
            $table->string('arquivo', 100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_documentacao_sistema');
    }
};

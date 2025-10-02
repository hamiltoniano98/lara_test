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
        Schema::create('cao_os_daily_report', function (Blueprint $table) {
            $table->integer('co_daily', true);
            $table->integer('co_os')->nullable()->default(0);
            $table->integer('co_fase')->nullable()->default(0);
            $table->string('co_usuario', 50)->nullable();
            $table->text('ds_assunto')->nullable();
            $table->time('tempo_gasto')->nullable();
            $table->dateTime('data')->nullable();
            $table->integer('co_status_atual')->nullable();
            $table->integer('co_chamado')->nullable();
            $table->integer('co_atividade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_os_daily_report');
    }
};

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
        Schema::create('cao_bonus_status', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('co_usuario', 128)->default('');
            $table->date('data_solic')->default('2000-01-01');
            $table->string('mes', 128)->default('');
            $table->string('valor', 128)->default('');
            $table->string('is_solic', 10)->nullable();
            $table->string('is_pg', 10)->nullable();
            $table->string('is_horas', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_bonus_status');
    }
};

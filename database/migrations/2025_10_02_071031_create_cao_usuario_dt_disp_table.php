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
        Schema::create('cao_usuario_dt_disp', function (Blueprint $table) {
            $table->increments('co_dt_disp');
            $table->string('co_usuario', 20)->nullable();
            $table->date('dt_disp')->default('2000-01-01');
            $table->date('dt_alt')->default('2000-01-01');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_usuario_dt_disp');
    }
};

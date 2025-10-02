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
        Schema::create('cao_agendamento', function (Blueprint $table) {
            $table->bigIncrements('co_agendamento');
            $table->dateTime('dt_hr_inicio')->default('2000-01-01 00:00:00');
            $table->dateTime('dt_hr_fim')->nullable();
            $table->bigInteger('co_status_agendamento')->default(0);
            $table->bigInteger('co_diary_report_consultor')->default(0);
            $table->bigInteger('co_complemento')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_agendamento');
    }
};

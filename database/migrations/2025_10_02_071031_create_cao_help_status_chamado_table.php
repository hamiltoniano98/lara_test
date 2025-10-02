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
        Schema::create('cao_help_status_chamado', function (Blueprint $table) {
            $table->integer('co_status', true)->unique('co_status');
            $table->string('ds_status', 50)->default('0');

            $table->index(['co_status'], 'co_status_2');
            $table->primary(['co_status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_help_status_chamado');
    }
};

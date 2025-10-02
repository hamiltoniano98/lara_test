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
        Schema::create('cao_os_analista', function (Blueprint $table) {
            $table->integer('co_analista', true);
            $table->integer('co_os')->nullable()->default(0);
            $table->string('co_usuario', 50)->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_os_analista');
    }
};

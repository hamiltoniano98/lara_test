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
        Schema::create('cao_arquitetura_os', function (Blueprint $table) {
            $table->bigInteger('co_arquitetura')->default(0)->primary();
            $table->string('ds_arquitetura', 20)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_arquitetura_os');
    }
};

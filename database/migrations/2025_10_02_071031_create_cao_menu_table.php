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
        Schema::create('cao_menu', function (Blueprint $table) {
            $table->tinyIncrements('co_menu');
            $table->string('ds_menu')->default('');
            $table->string('ds_pagina')->default('');
            $table->string('ds_imagem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_menu');
    }
};

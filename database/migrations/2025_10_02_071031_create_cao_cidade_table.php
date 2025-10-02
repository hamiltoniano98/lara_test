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
        Schema::create('cao_cidade', function (Blueprint $table) {
            $table->bigIncrements('co_cidade');
            $table->string('no_cidade', 30)->default('');
            $table->bigInteger('co_uf')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_cidade');
    }
};

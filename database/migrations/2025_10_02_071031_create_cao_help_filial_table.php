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
        Schema::create('cao_help_filial', function (Blueprint $table) {
            $table->increments('co_filial')->index('filialid');
            $table->string('no_filial', 70)->default('');
            $table->integer('co_cliente')->default(0);
            $table->char('estado', 2)->default('');

            $table->primary(['co_filial']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_help_filial');
    }
};

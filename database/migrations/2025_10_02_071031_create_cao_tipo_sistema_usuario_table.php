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
        Schema::create('cao_tipo_sistema_usuario', function (Blueprint $table) {
            $table->increments('co_sistema')->index('co_sistema');
            $table->string('ds_sistema', 40)->nullable();

            $table->primary(['co_sistema']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_tipo_sistema_usuario');
    }
};

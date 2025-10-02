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
        Schema::create('cao_conhecimentos', function (Blueprint $table) {
            $table->integer('idconhecimento', true);
            $table->string('assunto', 100)->default('');
            $table->text('conhecimento');
            $table->tinyText('url');
            $table->text('tags');
            $table->string('usuario', 20)->default('')->index('usuario');
            $table->dateTime('datahora')->default('2000-01-01 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_conhecimentos');
    }
};

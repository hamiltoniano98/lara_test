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
        Schema::table('cao_conhecimentos_fontes', function (Blueprint $table) {
            $table->foreign(['idconhecimento'], 'cao_conhecimentos_fontes_ibfk_1')->references(['idconhecimento'])->on('cao_conhecimentos')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cao_conhecimentos_fontes', function (Blueprint $table) {
            $table->dropForeign('cao_conhecimentos_fontes_ibfk_1');
        });
    }
};

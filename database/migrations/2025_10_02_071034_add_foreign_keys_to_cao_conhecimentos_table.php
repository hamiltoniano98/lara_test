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
        Schema::table('cao_conhecimentos', function (Blueprint $table) {
            $table->foreign(['usuario'], 'cao_conhecimentos_ibfk_1')->references(['co_usuario'])->on('cao_usuario')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cao_conhecimentos', function (Blueprint $table) {
            $table->dropForeign('cao_conhecimentos_ibfk_1');
        });
    }
};

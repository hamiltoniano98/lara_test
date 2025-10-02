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
        Schema::table('cao_permissao', function (Blueprint $table) {
            $table->foreign(['co_usuario'], 'cao_permissao_ibfk_1')->references(['co_usuario'])->on('cao_usuario')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cao_permissao', function (Blueprint $table) {
            $table->dropForeign('cao_permissao_ibfk_1');
        });
    }
};

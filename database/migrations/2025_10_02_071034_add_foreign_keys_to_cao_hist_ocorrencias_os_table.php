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
        Schema::table('cao_hist_ocorrencias_os', function (Blueprint $table) {
            $table->foreign(['co_usuario'], 'cao_hist_ocorrencias_os_ibfk_1')->references(['co_usuario'])->on('cao_usuario')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['co_os'], 'cao_hist_ocorrencias_os_ibfk_2')->references(['co_os'])->on('cao_os')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cao_hist_ocorrencias_os', function (Blueprint $table) {
            $table->dropForeign('cao_hist_ocorrencias_os_ibfk_1');
            $table->dropForeign('cao_hist_ocorrencias_os_ibfk_2');
        });
    }
};

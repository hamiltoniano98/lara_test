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
        Schema::table('cao_ombudsman', function (Blueprint $table) {
            $table->foreign(['idtipo'], 'cao_ombudsman_ibfk_1')->references(['idtipo'])->on('cao_tipo_ombudsman')->onUpdate('cascade')->onDelete('no action');
            $table->foreign(['idcategoria'], 'cao_ombudsman_ibfk_2')->references(['idcategoria'])->on('cao_categorias_ombudsman')->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cao_ombudsman', function (Blueprint $table) {
            $table->dropForeign('cao_ombudsman_ibfk_1');
            $table->dropForeign('cao_ombudsman_ibfk_2');
        });
    }
};

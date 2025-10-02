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
        Schema::create('cao_feriados', function (Blueprint $table) {
            $table->unsignedTinyInteger('dia')->nullable()->default(0);
            $table->unsignedTinyInteger('mes')->nullable()->default(0);
            $table->integer('ano')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_feriados');
    }
};

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
        Schema::create('cao_comissao', function (Blueprint $table) {
            $table->integer('co_comissao', true);
            $table->integer('co_fatura')->default(0)->unique('co_fatura');
            $table->date('dt_efetuado')->default('2000-01-01');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_comissao');
    }
};

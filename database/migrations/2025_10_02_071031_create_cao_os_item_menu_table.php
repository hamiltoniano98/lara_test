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
        Schema::create('cao_os_item_menu', function (Blueprint $table) {
            $table->integer('co_item', true);
            $table->string('ds_item')->default('');
            $table->integer('co_sistema')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_os_item_menu');
    }
};

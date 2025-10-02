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
        Schema::create('cao_pagamento', function (Blueprint $table) {
            $table->bigIncrements('co_pagamento')->index('nu_os');
            $table->string('co_usuario', 20)->default('');
            $table->char('tp_pagamento', 2)->default('0');
            $table->date('dt_pagamento')->default('2000-01-01');
            $table->float('vl_pagamento')->default(0);
            $table->date('dt_referencia_pagamento')->default('2000-01-01');

            $table->primary(['co_pagamento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_pagamento');
    }
};

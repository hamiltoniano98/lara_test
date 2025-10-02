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
        Schema::create('cao_usuario', function (Blueprint $table) {
            $table->string('co_usuario', 20)->default('')->unique('co_usuario');
            $table->string('no_usuario', 50)->default('');
            $table->string('ds_senha', 14)->default('');
            $table->string('co_usuario_autorizacao', 20)->nullable();
            $table->unsignedBigInteger('nu_matricula')->nullable();
            $table->date('dt_nascimento')->nullable()->default('2000-01-01');
            $table->date('dt_admissao_empresa')->nullable()->default('2000-01-01');
            $table->date('dt_desligamento')->nullable();
            $table->dateTime('dt_inclusao')->nullable()->default('2000-01-01 00:00:00');
            $table->date('dt_expiracao')->nullable()->default('2000-01-01');
            $table->string('nu_cpf', 14)->nullable();
            $table->string('nu_rg', 20)->nullable();
            $table->string('no_orgao_emissor', 10)->nullable();
            $table->string('uf_orgao_emissor', 2)->nullable();
            $table->string('ds_endereco', 150)->nullable();
            $table->string('no_email', 100)->nullable();
            $table->string('no_email_pessoal', 100)->nullable();
            $table->string('nu_telefone', 64)->nullable();
            $table->dateTime('dt_alteracao')->default('2000-01-01 00:00:00');
            $table->string('url_foto')->nullable();
            $table->string('instant_messenger', 80)->nullable();
            $table->unsignedInteger('icq')->nullable();
            $table->string('msn', 50)->nullable();
            $table->string('yms', 50)->nullable();
            $table->string('ds_comp_end', 50)->nullable();
            $table->string('ds_bairro', 30)->nullable();
            $table->string('nu_cep', 10)->nullable();
            $table->string('no_cidade', 50)->nullable();
            $table->string('uf_cidade', 2)->nullable();
            $table->date('dt_expedicao')->nullable();

            $table->index(['co_usuario', 'no_usuario', 'dt_alteracao'], 'co_usuario_2');
            $table->primary(['co_usuario']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cao_usuario');
    }
};

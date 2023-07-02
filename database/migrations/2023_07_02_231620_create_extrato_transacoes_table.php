<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('extrato_transacoes', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('account_id');
      $table->string('tipo');
      $table->decimal('valor', 10, 2);
      $table->string('destino');
      $table->datetime('data');

      $table->foreign('account_id')->references('account_number')->on('contas');
    });
  }

  public function down()
  {
    Schema::dropIfExists('extrato_transacoes');
  }
};

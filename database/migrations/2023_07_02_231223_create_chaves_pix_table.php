<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('chaves_pix', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('account_id');
      $table->string('tipo');
      $table->string('chave');

      $table->foreign('account_id')->references('account_number')->on('contas');
    });
  }

  public function down()
  {
    Schema::dropIfExists('chaves_pix');
  }
};

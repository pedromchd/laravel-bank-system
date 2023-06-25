<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('contas', function (Blueprint $table) {
      $table->unsignedBigInteger('user_id')->unique();
      $table->bigInteger('account_number')->unique();
      $table->decimal('limit', 10, 2)->default(1000.00);
      $table->decimal('balance', 10, 2);

      $table->foreign('user_id')->references('id')->on('usuarios');
    });
  }

  public function down()
  {
    Schema::dropIfExists('contas');
  }
};

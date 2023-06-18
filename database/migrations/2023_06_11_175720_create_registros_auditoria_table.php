<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('registros_auditoria', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('user_id');
      $table->datetime('login_at');
      $table->datetime('logout_at')->nullable();

      $table->foreign('user_id')->references('id')->on('usuarios');
    });
  }

  public function down()
  {
    Schema::dropIfExists('registros_auditoria');
  }
};

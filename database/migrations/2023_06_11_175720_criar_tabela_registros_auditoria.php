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
      $table->unsignedBigInteger('usuario_id');
      $table->timestamp('data_login');
      $table->timestamp('data_logout')->nullable();
      $table->timestamps();

      $table->foreign('usuario_id')->references('id')->on('usuarios');
    });
  }

  public function down()
  {
    Schema::dropIfExists('registros_auditoria');
  }
};

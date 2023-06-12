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
      $table->timestamp('login_date');
      $table->timestamp('logout_date')->nullable();
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('usuarios');
    });
  }

  public function down()
  {
    Schema::dropIfExists('registros_auditoria');
  }
};

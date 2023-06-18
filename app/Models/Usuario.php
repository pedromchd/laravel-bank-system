<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
  use HasFactory;

  protected $table = 'usuarios';

  protected $fillable = [
    'fullname',
    'username',
    'password',
  ];

  protected $hidden = [
    'password',
  ];

  protected $casts = [
    'password' => 'hashed',
  ];

  public $timestamps = false;

  public function contas()
  {
    return $this->hasOne(Conta::class);
  }

  public function registrosAuditoria()
  {
    return $this->hasMany(Auditoria::class);
  }
}

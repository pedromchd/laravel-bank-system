<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
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

  public function contas()
  {
    return $this->hasOne(Conta::class);
  }

  public function registrosAuditoria()
  {
    return $this->hasMany(Auditoria::class);
  }
}

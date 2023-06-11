<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  use HasFactory;

  protected $table = 'usuarios';

  protected $fillable = [
    'nome',
    'usuario',
    'senha',
  ];

  protected $hidden = [
    'senha',
  ];

  protected $casts = [
    'senha' => 'hashed',
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

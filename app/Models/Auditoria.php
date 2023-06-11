<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
  use HasFactory;

  protected $table = 'registros_auditoria';

  protected $fillable = [
    'usuario_id',
    'data_login',
    'data_logout',
  ];

  protected $casts = [
    'data_login' => 'datetime',
    'data_logout' => 'datetime',
  ];

  public function usuarios()
  {
    return $this->belongsTo(Usuario::class);
  }
}

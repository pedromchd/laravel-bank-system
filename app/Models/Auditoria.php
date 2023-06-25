<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
  use HasFactory;

  protected $table = 'registros_auditoria';

  protected $fillable = [
    'user_id',
    'login_at',
    'logout_at',
  ];

  protected $casts = [
    'login_at' => 'datetime',
    'logout_at' => 'datetime',
  ];

  public $timestamps = false;

  public function usuarios()
  {
    return $this->belongsTo(Usuario::class, 'user_id', 'id');
  }
}

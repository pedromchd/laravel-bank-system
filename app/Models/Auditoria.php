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
    'login_date',
    'logout_date',
  ];

  protected $casts = [
    'login_date' => 'datetime',
    'logout_date' => 'datetime',
  ];

  public function usuarios()
  {
    return $this->belongsTo(Usuario::class);
  }
}

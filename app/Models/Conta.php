<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
  use HasFactory;

  protected $table = 'contas';

  protected $fillable = [
    'user_id',
    'balance',
  ];

  protected $casts = [
    'balance' => 'decimal:2'
  ];

  public $timestamps = false;

  public function usuarios()
  {
    return $this->belongsTo(Usuario::class);
  }
}

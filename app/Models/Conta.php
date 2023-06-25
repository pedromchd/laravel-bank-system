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
    'account_number',
    'balance',
  ];

  protected $casts = [
    'balance' => 'decimal:2'
  ];

  public $timestamps = false;

  public function usuarios()
  {
    return $this->belongsTo(Usuario::class, 'user_id', 'id');
  }

  public function chavesPix()
  {
    return $this->hasMany(Chave::class, 'account_id', 'account_number');
  }

  public function extratoTransacoes()
  {
    return $this->hasMany(Extrato::class, 'account_id', 'account_number');
  }
}

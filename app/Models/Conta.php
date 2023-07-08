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
    'limit',
    'balance',
    'fatura',
    'cpf',
    'numero',
    'email',
  ];

  protected $casts = [
    'balance' => 'decimal:2',
    'limit' => 'decimal:2',
    'fatura' => 'decimal:2',
  ];

  public $timestamps = false;

  public function usuarios()
  {
    return $this->belongsTo(Usuario::class, 'user_id', 'id');
  }

  public function extratoTransacoes()
  {
    return $this->hasMany(Extrato::class, 'account_id', 'account_number');
  }
}

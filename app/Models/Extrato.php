<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrato extends Model
{
  protected $table = 'extrato_transacoes';

  protected $fillable = [
    'account_id',
    'tipo',
    'valor',
    'descricao',
    'destino',
    'data',
  ];

  protected $casts = [
    'valor' => 'decimal:2',
    'data' => 'datetime',
  ];

  public $timestamps = false;

  public function contas()
  {
    return $this->belongsTo(Conta::class, 'account', 'account_number');
  }
}

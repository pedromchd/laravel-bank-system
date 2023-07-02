<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pix extends Model
{
  use HasFactory;

  protected $table = 'chaves_pix';

  protected $fillable = [
    'account_id',
    'tipo',
    'chave',
  ];

  public $timestamps = false;

  public function contas()
  {
    return $this->belongsTo(Conta::class, 'account', 'account_number');
  }
}

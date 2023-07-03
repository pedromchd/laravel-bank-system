<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{
  public function geraPaginaHome()
  {
    return view('pages.home');
  }

  public function geraPaginaPagamentos()
  {
    return view('pages.pagamentos');
  }
}

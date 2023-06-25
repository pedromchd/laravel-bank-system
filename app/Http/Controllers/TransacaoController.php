<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{
  public function geraPaginaHome()
  {
    $conta = Auth::user()->contas;
    return view('pages.home', compact('conta'));
  }
}

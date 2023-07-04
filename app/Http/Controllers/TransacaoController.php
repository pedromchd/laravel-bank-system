<?php

namespace App\Http\Controllers;

use App\Models\Extrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{
  public function geraPaginaHome()
  {
    $extrato = Auth::user()->contas->extratoTransacoes;
    return view('pages.home', compact('extrato'));
  }

  public function geraPaginaPagamentos()
  {
    return view('pages.pagamentos');
  }

  public function geraPaginaChavesPix()
  {
    $chaves = Auth::user()->contas->chavesPix;
    return view('pages.chavespix', compact('chaves'));
  }

  public function cadastraChavePix(Request $resquest)
  {
  }

  public function pagar(Request $request)
  {
    $credenciais = $request->validate([
      'tipo' => ['required'],
      'valor' => ['decimal:2'],
    ]);

    $saldo = Auth::user()->contas->balance;
    $limit = Auth::user()->contas->limit;
    $fatura = Auth::user()->contas->fatura;
    $valor = $request->valor;

    if ($request->tipo === 'Depósito') {
      $saldo += $valor;
    }
    else if ($request->tipo === 'Fatura' && $valor <= $fatura) {
      if ($valor <= $saldo) {
        $saldo -= $valor;
        $fatura -= $valor;
        $limit += $valor;
      } else {
        return back();
      }
    }
    else if ($request->tipo !== 'Crédito') {
      if ($valor <= $saldo) {
        $saldo -= $valor;
      }
      else if ($valor > $saldo && $request->limite === 'off') {
        return back();
      }
      else if ($valor > $saldo && $request->limite === 'on' && $valor - $saldo <= $limit) {
        $fatura += $saldo + ($valor - $saldo) * 1.01;
        $saldo = 0;
        $limit -= ($valor - $saldo) * 1.01;
      } else {
        return back();
      }
    }
    else {
      if ($valor <= $limit) {
        $fatura += $saldo + ($valor - $saldo) * 1.01;
        $limit -= ($valor - $saldo) * 1.01;
      } else {
        return back();
      }
    }

    Auth::user()->contas->update([
      'limit' => $limit,
      'balance' => $saldo,
      'fatura' => $fatura,
    ]);

    Extrato::create([
      'account_id' => Auth::user()->contas->account_number,
      'tipo' => $request->tipo,
      'destino' => $request->destino,
      'valor' => $request->valor,
      'descricao' => $request->descricao,
      'data' => now('America/Sao_Paulo'),
    ]);

    return redirect('/');
  }
}

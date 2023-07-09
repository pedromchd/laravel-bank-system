<?php

namespace App\Http\Controllers;

use App\Models\Extrato;
use App\Models\Usuario;
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
    Auth::user()->contas->update([
      'cpf' => $resquest['cpf'],
      'celular' => $resquest['celular'],
      'email' => $resquest['email'],
    ]);

    return redirect('/transferencias');
  }

  public function geraPaginaTransferencias() {
    $users = Usuario::all();
    return view('pages.transferencias', compact('users'));
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
    $tipo = $request->tipo;

    if ($tipo === 'Depósito') {
      $saldo += $valor;
    }
    if ($tipo === 'Fatura') {
      if ($valor <= $saldo) {
        if ($valor <= $fatura) {
          $saldo -= $valor;
          $limit += $valor;
          $fatura -= $valor;
        } else {
          return back()->withErrors([
            'erro' => 'O valor informado é maior que o da fatura',
          ]);
        }
      } else {
        return back()->withErrors([
          'erro' => 'Você não tem saldo para realizar esta operação',
        ]);
      }
    }
    if ($tipo === 'Boleto' || $tipo === 'Débito') {
      if ($valor <= $saldo) {
        $saldo -= $valor;
      } else
      if ($request->limite === 'on') {
        $valor -= $saldo;
        $saldo = 0;
        if ($valor <= $limit) {
          $limit -= $valor * 1.01;
          $fatura += $valor * 1.01;
        } else {
          return back()->withErrors([
            'erro' => 'Você não tem limite para realizar esta operação',
          ]);
        }
      } else {
        return back()->withErrors([
          'erro' => 'Você não tem saldo para realizar esta operação',
        ]);
      }
    }
    if ($tipo === 'Crédito') {
      if ($valor <= $limit) {
        $limit -= $valor * 1.01;
        $fatura += $valor * 1.01;
      } else {
        return back()->withErrors([
          'erro' => 'Você não tem limite para realizar esta operação',
        ]);
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

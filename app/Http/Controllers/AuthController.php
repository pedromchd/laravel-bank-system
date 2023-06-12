<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function geraPaginaLogin()
  {
    return view('auth.login');
  }

  public function geraPaginaCadastro()
  {
    return view('auth.cadastro');
  }

  public function login(Request $request)
  {
    $credenciais = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credenciais)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }

    return back()->withErrors([
      'username' => 'Usuário ou senha incorretos.',
    ]);
  }

  public function cadastro(Request $request)
  {
    $credenciais = $request->validate([
      'fullname' => ['required'],
      'username' => ['required', 'unique:usuarios'],
      'password' => ['required', 'min:8', 'confirmed'],
      'saldo' => ['decimal:2'],
    ]);

    Usuario::create([
      'fullname' => $credenciais['fullname'],
      'username' => $credenciais['username'],
      'password' => $credenciais['password'],
    ]);

    return redirect('/login')->with('success', 'Cadastro realizado com sucesso.');

    return back()->withErrors([
      'fullname' => 'O campo não pode ser vazio.',
      'username' => 'O campo não pode ser vazio.',
      'password' => 'A senha deve ter pelo menos 8 caracteres.',
      'password_confirmation' => 'As senhas não conferem.',
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}

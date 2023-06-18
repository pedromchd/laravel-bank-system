@extends('layouts.app')

@section('title', 'Login')

@section('main')
  <h2>Fazer login</h2>
  <form action="{{ route('login') }}" method="post">
    @csrf
    <div>
      <label for="username">Usuário:</label>
      <input type="text" name="username" id="username">
    </div>
    <div>
      <label for="password">Senha:</label>
      <input type="password" name="password" id="password">
    </div>
    <a href="{{ url('/cadastro') }}">Fazer cadastro</a>
    <button type="submit">Entrar</button>
  </form>
@endsection

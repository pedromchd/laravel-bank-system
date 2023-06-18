@extends('layouts.app')

@section('title', 'Cadastro')

@section('main')
  <h2>Fazer cadastro</h2>
  <form action="{{ route('cadastro') }}" method="post">
    @csrf
    <div>
      <label for="fullname">Nome completo:</label>
      <input type="text" name="fullname" id="fullname">
    </div>
    <div>
      <label for="username">Usuário:</label>
      <input type="text" name="username" id="username">
    </div>
    <div>
      <label for="password">Senha:</label>
      <input type="password" name="password" id="password">
    </div>
    <div>
      <label for="password_confirmation">Confirmar senha:</label>
      <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    <a href="{{ url('/login') }}">Fazer login</a>
    <button type="submit">Cadastrar</button>
  </form>
@endsection

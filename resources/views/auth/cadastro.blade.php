@extends('layouts.app')

@section('title', 'Cadastro')

@section('main')
  <main class="flex-grow bg-orange-50 grid grid-cols-2">
    <img src="{{ asset('img/pexels-pixabay-50987.jpg') }}" alt="Pessoa segurando cartão de débito" class="h-full object-cover">
    <div class="place-self-center w-96">
      <h2 class="mb-7 text-5xl font-light">Cadastro</h2>
      <form action="{{ route('cadastro') }}" method="post">
        @csrf
        <div class="space-y-3 mb-7">
          <div class="-space-y-1">
            <label for="fullname" class="block text-sm">Nome completo:</label>
            <input type="text" name="fullname" id="fullname" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg" autofocus>
          </div>
          <div class="-space-y-1">
            <label for="username" class="block text-sm">Usuário:</label>
            <input type="text" name="username" id="username" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
          <div class="-space-y-1">
            <label for="password" class="block text-sm">Senha:</label>
            <input type="password" name="password" id="password" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
          <div class="-space-y-1">
            <label for="password_confirmation" class="block text-sm">Confirmar senha:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
          <div class="-space-y-1">
            <label for="deposito" class="block text-sm">Depósito inicial:</label>
            <input type="number" step="0.01" name="deposito" id="deposito" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
        </div>
        <div class="grid grid-cols-2">
          <a href="{{ url('/login') }}" class="block place-self-center text-orange-500 underline">Fazer login</a>
          <button type="submit" class="block h-12 bg-orange-500 text-white font-bold rounded-sm shadow-sm">Cadastrar</button>
        </div>
      </form>
    </div>
  </main>
@endsection
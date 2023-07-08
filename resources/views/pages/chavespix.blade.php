@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="flex-grow bg-orange-50 grid grid-cols-2 place-items-center">
    <div class="w-96">
      <div class="flex justify-between">
        <h2 class="mb-3 text-5xl font-light">Minhas chaves</h2>
        <a href="{{ url('/cadastrarchave') }}">Cadastrar chave pix</a>
      </div>
    </div>
    <div class="w-96">
      <form action="{{ route('cadastraChavePix') }}" method="post">
        @csrf
        <div class="space-y-3 mb-7">
          <div class="-space-y-1">
            <label for="cpf" class="block text-sm">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg"  autofocus>
          </div>
          <div class="-space-y-1">
            <label for="telefone" class="block text-sm">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
          <div class="-space-y-1">
            <label for="email" class="block text-sm">E-mail:</label>
            <input type="email" name="email" id="email" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
        </div>
        <div class="grid grid-cols-2">
          <a href="{{ url('/') }}" class="block place-self-center text-orange-500 underline">Voltar</a>
          <button type="submit" class="block h-12 bg-orange-500 text-white font-bold rounded-sm shadow-sm">Pagar</button>
        </div>
      </form>
    </div>
  </main>
@endsection

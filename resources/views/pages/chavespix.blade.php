@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="flex-grow bg-orange-50 grid grid-cols-2 place-items-center">
    <h2 class="mb-3 text-5xl font-light">Cadastrar ou editar Chaves</h2>
    <div class="w-96">
      <form action="{{ route('cadastraChavePix') }}" method="post">
        @csrf
        <div class="space-y-3 mb-7">
          <div class="-space-y-1">
            <label for="cpf" class="block text-sm">CPF:</label>
            <input  value="{{ Auth::user()->contas->cpf }}" type="text" name="cpf" id="cpf" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg"  autofocus>
          </div>
          <div class="-space-y-1">
            <label for="celular" class="block text-sm">Celular:</label>
            <input  value="{{ Auth::user()->contas->celular }}" type="text" name="celular" id="celular" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
          <div class="-space-y-1">
            <label for="email" class="block text-sm">E-mail:</label>
            <input  value="{{ Auth::user()->contas->email }}" type="email" name="email" id="email" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
        </div>
        <div class="grid grid-cols-2">
          <a href="{{ url('/transferencias') }}" class="block place-self-center text-orange-500 underline">Voltar</a>
          <button type="submit" class="block h-12 bg-orange-500 text-white font-bold rounded-sm shadow-sm">Cadastrar</button>
        </div>
      </form>
    </div>
  </main>
@endsection

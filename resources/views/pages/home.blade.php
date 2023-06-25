@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="flex-grow bg-orange-50 flex flex-col">
    <section class="p-5 bg-orange-400 flex items-center justify-between">
      <div class="text-lg text-white font-bold">
        <p>Olá, {{ $conta->usuarios->fullname }}!</p>
        <p>Bem-vindo ao Bah!Bank.</p>
      </div>
      <div class="text-lg text-white font-bold">
        <p>Saldo: R${{ number_format($conta->balance, 2, ',', '.') }}</p>
        <p>Limite: R${{ number_format($conta->limit, 2, ',', '.') }}</p>
      </div>
    </section>
  </main>
@endsection

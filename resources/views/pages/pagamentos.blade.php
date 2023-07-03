@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="flex-grow bg-orange-50 grid grid-cols-2 place-items-center">
    <h2 class="mb-7 text-5xl font-light">Fazer pagamento</h2>
    <div class="w-96">
      <form action="{{ route('pagar') }}" method="post">
        @csrf
        <div class="space-y-3 mb-7">
          <div class="-space-y-1">
            <label for="tipo" class="block text-sm">Tipo de transação:</label>
            <input type="text" name="tipo" id="tipo" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
          </div>
          <div class="-space-y-1">
            <label for="destino" class="block text-sm">Destino:</label>
            <input type="text" name="destino" id="destino" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg" autofocus>
          </div>
          <div class="-space-y-1">
            <label for="valor" class="block text-sm">Valor:</label>
            <input type="number" step="0.01" name="valor" id="valor" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
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

@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="flex-grow bg-orange-50 grid grid-cols-2 place-items-center">
    <div class="ml-10 w-full">
      <div class="flex items-center justify-between">
        <h2 class="mb-7 text-2xl font-light">Minhas chaves</h2>
        <a href="{{ url('/cadastrarchave') }}">Cadastrar chave pix</a>
      </div>
      <div>
        <table>
          
        </table>
      </div>
    </div>
    <div class="w-96">
      <form action="{{ route('pagar') }}" method="post">
        @csrf
        <div class="space-y-3 mb-7">
          <div class="-space-y-1">
            <label for="tipo" class="block text-sm">Tipo de transação:</label>
            <select name="tipo" id="tipo" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
              <option value="Pix">Pix</option>
              <option value="Depósito">Depósito</option>
            </select>
          </div>
          <div class="-space-y-1" id="boleto">
            <label for="destino" class="block text-sm">Chave Pix:</label>
            <input type="text" name="destino" id="destino" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg" autofocus>
          </div>
          <div class="-space-y-1">
            <label for="descricao" class="block text-sm">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg" autofocus>
          </div>
          <div class="-space-y-1">
            <label for="valor" class="block text-sm">Valor:</label>
            <input type="number" step="0.01" name="valor" id="valor" class="bg-transparent outline-none block py-1 w-full border-b-2 border-orange-500 text-lg">
            <label for="limite" id="limite_box">
              <input type="checkbox" name="limite" id="limite">
              Usar limite disponível (taxa de 1% na fatura);
            </label>
          </div>
          <script>
            const tipo = document.forms[1].tipo;
            const form_boleto = document.querySelector('#boleto');
            const check_limite = document.querySelector('#limite_box');
            tipo.addEventListener('change', (e) => {
              if (tipo.value !== 'Pix') {
                form_boleto.style.display = 'none';
              } else {
                form_boleto.style.display = 'inherit';
              }
              if (tipo.value === 'Depósito') {
                check_limite.style.display = 'none';
              } else {
                check_limite.style.display = 'inherit';
              }
            });
          </script>
        </div>
        <div class="grid grid-cols-2">
          <a href="{{ url('/') }}" class="block place-self-center text-orange-500 underline">Voltar</a>
          <button type="submit" class="block h-12 bg-orange-500 text-white font-bold rounded-sm shadow-sm">Pagar</button>
        </div>
      </form>
    </div>
  </main>
@endsection

@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="flex-grow bg-orange-50 grid grid-cols-2 place-items-center">
    <div class="ml-10 w-full">
      <div class="flex items-center justify-between">
        <p class="text-3xl font-thin mb-3">Suas chaves pix</p>
        <a href="{{ url('/chaves_pix') }}" class="underline text-lg text-orange-500">Cadastrar ou editar Chaves</a>
      </div>
      <table class="w-[100%]">
        <tr class="border border-orange-700 divide-x divide-orange-700">
          <th class="p-2">Tipo</th>
          <th class="p-2">Chave</th>
        </tr>
        <tr class="border border-orange-700 divide-x divide-orange-700">
          <td class="p-2">Conta</td>
          <td class="p-2">{{ Auth::user()->contas->account_number }}</td>
        </tr>
        @unless (empty(Auth::user()->contas->cpf))
        <tr class="border border-orange-700 divide-x divide-orange-700">
          <td class="p-2">CPF</td>
          <td class="p-2">{{ Auth::user()->contas->cpf }}</td>
        </tr>
        @endunless
        @unless (empty(Auth::user()->contas->email))
        <tr class="border border-orange-700 divide-x divide-orange-700">
          <td class="p-2">E-mail</td>
          <td class="p-2">{{ Auth::user()->contas->email }}</td>
        </tr>
        @endunless
        @unless (empty(Auth::user()->contas->numero))
        <tr class="border border-orange-700 divide-x divide-orange-700">
          <td class="p-2">Número</td>
          <td class="p-2">{{ Auth::user()->contas->numero }}</td>
        </tr>
        @endunless
      </table>
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

@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <main class="overflow-y-scroll p-7 flex-grow bg-orange-50">
    <p class="text-3xl font-thin mb-3">Extrato de transações</caption>
    <table class="w-[100%]">
      <tr class="border border-orange-700 divide-x divide-orange-700">
        <th class="p-2">Tipo</th>
        <th class="p-2">Data</th>
        <th class="p-2">Descrição</th>
        <th class="p-2">Destino</th>
        <th class="p-2">Valor</th>
      </tr>
      @forelse ($extrato as $item)
      <tr class="border border-orange-700 divide-x divide-orange-700">
        <td class="p-2">{{ $item->tipo }}</td>
        <td class="p-2">{{ $item->data }}</td>
        <td class="p-2">{{ $item->descricao }}</td>
        <td class="p-2">{{ $item->destino }}</td>
        <td class="p-2">{{ $item->valor }}</td>
      </tr>
      @empty
      <tr class="border border-orange-700 divide-x divide-orange-700">
        <td class="p-2">Sem histórico para mostrar</td>
      </tr>
      @endforelse
    </table>
  </main>
@endsection

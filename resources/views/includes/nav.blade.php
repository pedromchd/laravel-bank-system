<nav class="p-7 bg-orange-400 flex items-center justify-between">
  <div class="text-lg text-white font-bold">
    <p>Olá, {{ $conta->usuarios->fullname }}!</p>
    <p>Bem-vindo ao Bah!Bank.</p>
  </div>
  <div class="text-lg text-white font-bold">
    <p>Saldo: R${{ number_format($conta->balance, 2, ',', '.') }}</p>
    <p>Limite: R${{ number_format($conta->limit, 2, ',', '.') }}</p>
  </div>
  <div class="flex gap-5">
    <a href="{{ url('extrato') }}" class="w-32 h-12 grid place-items-center bg-white text-orange-500 rounded-md shadow-md">Extrato</a>
    <a href="{{ url('pagamentos') }}" class="w-32 h-12 grid place-items-center bg-white text-orange-500 rounded-md shadow-md">Pagamentos</a>
    <a href="{{ url('transferencias') }}" class="w-32 h-12 grid place-items-center bg-white text-orange-500 rounded-md shadow-md">Transferências</a>
  </div>
</nav>
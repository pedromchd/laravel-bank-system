<header>
  <div class="pr-7 py-3 bg-orange-500 flex items-center justify-between">
    <a href="{{ url('/') }}" class="flex items-center">
      <img src="{{ asset('img/bah-logo.png') }}" alt="Bah!Bank Logo" class="h-20">
      <span class="-ml-5 text-white text-5xl font-bold drop-shadow-md"><span class="text-[#a84500]">ah!</span>Bank</span>
    </a>
    @if (Auth::check())
    <div class="text-lg text-white font-bold">
      <p>Usuário: {{ $conta->usuarios->username }}</p>
      <p>Número da conta: {{ $conta->account_number }}</p>
    </div>
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <button type="submit" class="block w-32 h-12 bg-[#a84500] text-white font-bold rounded-md shadow-md">Logout</button>
    </form>
    @endif
  </div>
  @if (Auth::check())
  @include('includes.nav')
  @endif
</header>
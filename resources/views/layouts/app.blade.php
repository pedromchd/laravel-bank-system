<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') - Bah!Bank</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
  @if (Auth::check()) @php
    $conta = Auth::user()->contas;
  @endphp @endif

  @include('includes.header')

  @yield('main')

  @include('includes.footer')
  <script>
    const valor = document.querySelector('input#valor');
    if (valor) {
      valor.value = '0.00';
    }
  </script>
  @if ($errors->any())
    <script>
        var errorMessage = {!! json_encode($errors->all()) !!}.join('\n');
        alert(errorMessage);
    </script>
  @endif
</body>

</html>
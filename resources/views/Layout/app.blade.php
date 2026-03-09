<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Federação Futsal')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- NAVBAR SIMPLES -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Federação Futsal</a>

            <div>
                <a href="{{ route('campeonatos.index') }}" class="btn btn-outline-light btn-sm">Campeonatos</a>

                {{-- Meu querido namorado, adicione a porra do Times aqui depois --}}
            </div>
        </div>
    </nav>

    <main class="container mt-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>
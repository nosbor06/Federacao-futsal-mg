<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Federação Futsal')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- NAVBAR — só aparece quando logado -->
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Federação Futsal</a>

            <div>
                {{-- Times e Atletas: todos podem ver --}}
                <a href="{{ route('times.index') }}" class="btn btn-outline-light btn-sm">Times</a>
                <a href="{{ route('atletas.index') }}" class="btn btn-outline-light btn-sm">Atletas</a>

                {{-- Campeonatos e Classificação: só admin --}}
                @if(auth()->user()->tipo === 'admin')
                    <a href="{{ route('campeonatos.index') }}" class="btn btn-outline-light btn-sm">Campeonatos</a>
                    <a href="{{ route('TabelaClassificacoes.index') }}" class="btn btn-outline-light btn-sm">Classificação</a>
                @endif

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Sair</button>
                </form>
            </div>
        </div>
    </nav>
    @endauth

    <main class="container mt-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>
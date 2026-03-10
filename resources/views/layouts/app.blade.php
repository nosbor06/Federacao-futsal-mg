<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Federação Futsal')</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body class="bg-light">


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('times.index') }}">
            Federação Futsal mg
        </a>

        <div class="d-flex gap-2">

            <!-- TIMES -->
            <a href="{{ route('times.index') }}" class="btn btn-outline-light btn-sm">
                Times
            </a>

            <!-- ATLETAS -->
            <a href="{{ route('atletas.index') }}" class="btn btn-outline-light btn-sm">
                Atletas
            </a>

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

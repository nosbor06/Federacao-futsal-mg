<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Federação Mineira de Futsal')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .navbar-custom {
            background: #1a0000;
        }

        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .btn-login {
            background: #cc0000;
            color: white;
            border-radius: 20px;
            padding: 6px 16px;
        }

        .btn-login:hover {
            background: #a80000;
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-custom px-4">
    <span class="navbar-brand">Federação Mineira de Futsal</span>

    <div class="ms-auto">
        <a href="{{ route('login') }}" class="btn btn-login">
            <i class="bi bi-box-arrow-in-right"></i> Entrar
        </a>
    </div>
</nav>

<div class="container py-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
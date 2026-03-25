<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #cc0000;
            --dark-color: #1a0000;
        }

        /* NAVBAR */
        .navbar-login {
            background: var(--dark-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-login .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .navbar-login .navbar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .btn-back {
            background: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 13px;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .btn-back:hover {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>

<body class="bg-dark">

    {{-- NAVBAR SIMPLES COM LOGO E BOTÃO VOLTAR --}}
    <nav class="navbar-login">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo FMF">
            <span>Federação Mineira de Futsal</span>
        </a>

        <button onclick="history.back()" class="btn-back" title="Voltar">
            <i class="bi bi-arrow-left"></i> Voltar
        </button>
    </nav>

    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">



        {{-- Nome da federação --}}
        <p class="text-white fw-bold fs-5 mb-3"> Federação Mineira de Futsal</p>

        <div class="card bg-dark text-white shadow" style="width: 400px; border: 1px solid #444;">

            <div class="card-header bg-black text-white text-center">
                <h4 class="mb-0">Login</h4>
            </div>

            <div class="card-body">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.auth') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control bg-secondary text-white border-0"
                            value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control bg-secondary text-white border-0"
                            required>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">
                        Entrar
                    </button>

                </form>

                <hr style="border-color: #444;">

                <div class="text-center">
                    <a href="{{ route('cadastro') }}" class="text-white-50">
                        Não tem conta? <span class="text-white">Criar conta</span>
                    </a>
                </div>

                <div class="text-center mt-2">
                    <a href="{{ route('password.request')}}" class="text-white-50">
                        <span class="text-white">Esqueci minha senha</span>
                    </a>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
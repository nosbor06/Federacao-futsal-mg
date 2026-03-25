<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Federação Mineira de Futsal')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #cc0000;
            --dark-color: #1a0000;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f4f6f9;
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* NAVBAR */
        .navbar-custom {
            background: var(--dark-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            cursor: pointer;
        }

        .navbar-custom .navbar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            margin: 0;
            margin-left: auto;
            padding: 0;
        }

        .nav-links li {
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            gap: 2rem;
            width: 100%;
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

        .btn-login {
            background: var(--primary-color);
            color: white;
            border-radius: 20px;
            padding: 8px 18px;
            border: none;
            font-size: 13px;
            transition: all 0.3s;
            text-decoration: none;
            margin-left: auto;
        }

        .btn-login:hover {
            background: #aa0000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(204, 0, 0, 0.3);
            color: white;
        }

        /* HERO SECTION */
        .hero-section {
            background: linear-gradient(135deg, var(--dark-color) 0%, #330000 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            margin-top: 0;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .hero-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-primary-custom:hover {
            background-color: #aa0000;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(204, 0, 0, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background-color: transparent;
            color: white;
            padding: 12px 30px;
            border: 2px solid white;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-secondary-custom:hover {
            background-color: white;
            color: var(--dark-color);
        }

        /* SECTIONS */
        .section-container {
            padding: 3rem 2rem;
            background-color: white;
            margin: 2rem auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            max-width: 1200px;
        }

        .section-title {
            font-size: 1.8rem;
            color: var(--dark-color);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 12px;
            padding-top: 1rem;
        }

        .section-title i {
            color: var(--primary-color);
            font-size: 2rem;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar-custom {
                padding: 1rem;
            }

            .nav-wrapper {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .nav-links {
                gap: 1rem;
                margin-left: 0;
                font-size: 12px;
                width: 100%;
                order: 3;
            }

            .btn-back {
                order: 1;
                padding: 6px 10px;
                font-size: 12px;
            }

            .btn-login {
                margin-left: auto;
                order: 2;
                padding: 6px 14px;
                font-size: 12px;
            }

            .hero-section h1 {
                font-size: 1.8rem;
            }

            .hero-section p {
                font-size: 0.95rem;
            }

            .hero-buttons {
                gap: 0.5rem;
            }

            .btn-primary-custom,
            .btn-secondary-custom {
                padding: 10px 20px;
                font-size: 13px;
            }

            .section-container {
                margin: 1.5rem auto;
                padding: 2rem 1rem;
            }

            .section-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar-custom">
        <div class="nav-wrapper">

            <a href="#" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo FMF">
                <span>Federação Mineira de Futsal</span>
            </a>

            <ul class="nav-links">
                <li><a href="#tabelas"><i class="bi bi-list-ol"></i> Tabela de Classificação</a></li>
                <li><a href="#noticias"><i class="bi bi-newspaper"></i> Notícias</a></li>
            </ul>

            <a href="{{ route('login') }}" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right"></i> Entrar
            </a>
        </div>
    </nav>

    {{-- HERO SECTION - BEM-VINDO --}}
    <section class="hero-section">
        <h1>Bem-vindo à Federação Mineira de Futsal</h1>
        <p>Acompanhe os campeonatos, tabelas de classificação e notícias do futsal em Minas Gerais</p>
        <div class="hero-buttons">
            <a href="#tabelas" class="btn-primary-custom">
                <i class="bi bi-list-ol"></i> Ver Tabelas
            </a>
            <a href="#noticias" class="btn-secondary-custom">
                <i class="bi bi-newspaper"></i> Ler Notícias
            </a>
        </div>
    </section>

    {{-- SEÇÃO TABELA DE CLASSIFICAÇÃO --}}
    <section id="tabelas" class="section-container">
       
        @yield('tabelas')
    </section>

    {{-- SEÇÃO NOTÍCIAS --}}
    <section id="noticias" class="section-container">
       
        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
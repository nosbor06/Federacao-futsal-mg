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

        /* Estilo das Tabelas de Campeonatos */
        .campeonato-header {
            border-bottom: 3px solid var(--primary-color);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
        }

        .campeonato-header h4 {
            color: var(--primary-color);
            font-weight: bold;
            margin: 0;
        }

        .podium-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: flex-end;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .podium-item {
            text-align: center;
            flex: 1;
            min-width: 120px;
        }

        .podium-medal {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .podium-medal.first {
            font-size: 3rem;
        }

        .podium-escudo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin: 0 auto 10px;
            display: block;
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

            .table {
                font-size: 0.85rem;
            }

            .table th,
            .table td {
                padding: 8px 4px !important;
            }

            .podium-container {
                gap: 8px;
            }

            .podium-item {
                min-width: 100px;
            }

            .podium-medal {
                font-size: 2rem;
            }

            .podium-medal.first {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar-custom">
        <div class="nav-wrapper">

            <a href="/" class="navbar-brand">
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
        <h2 class="section-title">
            <i class="bi bi-list-ol"></i>Tabelas de Classificação
        </h2>

        @if(isset($tabelasPorCampeonato) && count($tabelasPorCampeonato) > 0)

            @foreach($tabelasPorCampeonato as $campId => $data)
                @php
                    $campeonato = $data['campeonato'];
                    $classificacoes = $data['classificacoes'];
                @endphp

                <div class="campeonato-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4><i class="bi bi-flag-fill me-2"></i>{{ $campeonato->nome }}</h4>
                            <small class="text-muted">
                                <i class="bi bi-tag me-1"></i>{{ $campeonato->categoria }}
                                @if($campeonato->status === 'em_andamento')
                                    <span class="badge bg-warning text-dark ms-2">⏱️ Em Andamento</span>
                                @elseif($campeonato->status === 'inscricoes_abertas')
                                    <span class="badge bg-success ms-2">📝 Inscrições Abertas</span>
                                @else
                                    <span class="badge bg-secondary ms-2">✅ Encerrado</span>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Pódio (Top 3) -->
                @if(count($classificacoes) >= 3)
                    <div class="podium-container">
                        <!-- 2º Lugar -->
                        @php $segundo = $classificacoes->get(1); @endphp
                        @if($segundo)
                            <div class="podium-item">
                                <div class="podium-medal">🥈</div>
                                @if($segundo->time->escudo)
                                    @php
                                        $escudoUrl = Str::startsWith($segundo->time->escudo, ['images/', 'http'])
                                            ? asset($segundo->time->escudo)
                                            : asset('storage/' . $segundo->time->escudo);
                                    @endphp
                                    <img src="{{ $escudoUrl }}" class="podium-escudo">
                                @endif
                                <div class="fw-bold">{{ $segundo->time->nome }}</div>
                                <small class="text-muted">{{ $segundo->pontos }} pts</small>
                            </div>
                        @endif

                        <!-- 1º Lugar -->
                        @php $primeiro = $classificacoes->get(0); @endphp
                        @if($primeiro)
                            <div class="podium-item">
                                <div class="podium-medal first">🥇</div>
                                @if($primeiro->time->escudo)
                                    @php
                                        $escudoUrl = Str::startsWith($primeiro->time->escudo, ['images/', 'http'])
                                            ? asset($primeiro->time->escudo)
                                            : asset('storage/' . $primeiro->time->escudo);
                                    @endphp
                                    <img src="{{ $escudoUrl }}" class="podium-escudo">
                                @endif
                                <div class="fw-bold" style="color: var(--primary-color);">{{ $primeiro->time->nome }}</div>
                                <small class="text-muted fw-bold">{{ $primeiro->pontos }} pts</small>
                            </div>
                        @endif

                        <!-- 3º Lugar -->
                        @php $terceiro = $classificacoes->get(2); @endphp
                        @if($terceiro)
                            <div class="podium-item">
                                <div class="podium-medal">🥉</div>
                                @if($terceiro->time->escudo)
                                    @php
                                        $escudoUrl = Str::startsWith($terceiro->time->escudo, ['images/', 'http'])
                                            ? asset($terceiro->time->escudo)
                                            : asset('storage/' . $terceiro->time->escudo);
                                    @endphp
                                    <img src="{{ $escudoUrl }}" class="podium-escudo">
                                @endif
                                <div class="fw-bold">{{ $terceiro->time->nome }}</div>
                                <small class="text-muted">{{ $terceiro->pontos }} pts</small>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Tabela Completa -->
                <div class="table-responsive mb-5">
                    <table class="table table-bordered bg-white">
                        <thead style="background-color: var(--primary-color); color: white;">
                            <tr>
                                <th style="width: 50px; text-align: center;">#</th>
                                <th>Time</th>
                                <th style="text-align: center; width: 80px;">Pts</th>
                                <th style="text-align: center; width: 60px;">J</th>
                                <th style="text-align: center; width: 60px;">V</th>
                                <th style="text-align: center; width: 60px;">E</th>
                                <th style="text-align: center; width: 60px;">D</th>
                                <th style="text-align: center; width: 60px;">GP</th>
                                <th style="text-align: center; width: 60px;">GC</th>
                                <th style="text-align: center; width: 70px;">SG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classificacoes as $index => $item)
                                <tr>
                                    <!-- Posição -->
                                    <td style="text-align: center; font-weight: bold; font-size: 1.1rem;">
                                        @if($index === 0) 🥇 
                                        @elseif($index === 1) 🥈 
                                        @elseif($index === 2) 🥉 
                                        @else 
                                            <span style="color: var(--primary-color);">{{ $index + 1 }}º</span>
                                        @endif
                                    </td>

                                    <!-- Nome do Time com Escudo -->
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 10px;">
                                            @if($item->time->escudo)
                                                @php
                                                    $escudoUrl = Str::startsWith($item->time->escudo, ['images/', 'http'])
                                                        ? asset($item->time->escudo)
                                                        : asset('storage/' . $item->time->escudo);
                                                @endphp
                                                <img src="{{ $escudoUrl }}" 
                                                     style="width: 32px; height: 32px; object-fit: contain;">
                                            @else
                                                <i class="bi bi-shield text-secondary"></i>
                                            @endif
                                            <span style="font-weight: 600;">{{ $item->time->nome }}</span>
                                        </div>
                                    </td>

                                    <!-- Pontos -->
                                    <td style="text-align: center; font-weight: bold; color: var(--primary-color);">
                                        {{ $item->pontos }}
                                    </td>

                                    <!-- Estatísticas -->
                                    <td style="text-align: center;">{{ $item->jogos }}</td>
                                    <td style="text-align: center; color: #28a745;"><strong>{{ $item->vitorias }}</strong></td>
                                    <td style="text-align: center; color: #ffc107;"><strong>{{ $item->empates }}</strong></td>
                                    <td style="text-align: center; color: #dc3545;"><strong>{{ $item->derrotas }}</strong></td>
                                    <td style="text-align: center;">{{ $item->gols_pro }}</td>
                                    <td style="text-align: center;">{{ $item->gols_contra }}</td>
                                    <td style="text-align: center; font-weight: bold;">
                                        <span style="color: {{ $item->saldo_gols >= 0 ? '#28a745' : '#dc3545' }};">
                                            {{ $item->saldo_gols >= 0 ? '+' : '' }}{{ $item->saldo_gols }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" style="text-align: center; padding: 30px; color: #999;">
                                        <i class="bi bi-inbox" style="font-size: 2rem; margin-bottom: 10px; display: block; opacity: 0.5;"></i>
                                        <p>Nenhum time classificado neste campeonato ainda</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            @endforeach

        @else
            <div class="alert alert-info d-flex align-items-center" role="alert" style="background-color: #e3f2fd; border-color: #90caf9; color: #1565c0;">
                <i class="bi bi-info-circle me-2" style="font-size: 1.3rem;"></i>
                <div>
                    <strong>Nenhum campeonato ativo</strong> - Volte em breve para acompanhar os campeonatos da Federação Mineira de Futsal!
                </div>
            </div>
        @endif
    </section>

    {{-- SEÇÃO NOTÍCIAS --}}
    <section id="noticias" class="section-container">
        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
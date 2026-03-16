<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Federação Mineira de Futsal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: 240px; height: 100vh;
            background-color: #1a0000;
            display: flex; flex-direction: column;
            z-index: 100; overflow-y: auto;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.6);
            border-radius: 6px; font-size: 14px;
            padding: 8px 12px;
        }
        .sidebar .nav-link:hover { background: rgba(255,255,255,.07); color: #fff; }
        .sidebar .nav-link.active { background-color: #cc0000; color: #fff; }
        .sidebar .nav-link i { width: 18px; text-align: center; }
        .sidebar-label {
            font-size: 10px; font-weight: 700;
            letter-spacing: 1.5px; text-transform: uppercase;
            color: rgba(255,255,255,.25); padding: 14px 12px 4px;
        }
        .main-content { margin-left: 240px; min-height: 100vh; background-color: #f8f9fa; }
        .topbar { background: #fff; border-bottom: 1px solid #dee2e6; padding: 12px 24px; }
        .btn-logout {
            background: none; border: none;
            color: rgba(255,255,255,.35); cursor: pointer;
            padding: 4px 6px; border-radius: 6px; transition: color .15s;
        }
        .btn-logout:hover { color: #f87171; }
    </style>
</head>
<body>

@auth
<aside class="sidebar">

    {{-- Logo --}}
    <a href="{{ auth()->user()->tipo === 'admin' ? route('admin.dashboard') : route('responsavel.dashboard') }}"
       class="d-flex align-items-center gap-2 px-3 py-3 text-decoration-none"
       style="border-bottom: 1px solid rgba(255,255,255,.08);">
        <img src="{{ asset('images/logo.png') }}" alt="Logo FMF"
             style="width:42px;height:42px;object-fit:contain;flex-shrink:0;filter:brightness(0) invert(1);">
        <div>
            <div class="text-white fw-bold" style="font-size:13px;line-height:1.2;">Federação Mineira</div>
            <div class="text-white-50" style="font-size:10px;">de Futsal</div>
        </div>
    </a>

    {{-- Menu --}}
    <nav class="flex-grow-1 px-2 pt-2">
        <div class="sidebar-label">Menu</div>

        @if(auth()->user()->tipo === 'admin')
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link d-flex align-items-center gap-2 mb-1 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        @else
            <a href="{{ route('responsavel.dashboard') }}"
               class="nav-link d-flex align-items-center gap-2 mb-1 {{ request()->routeIs('responsavel.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        @endif

        <a href="{{ route('times.index') }}"
           class="nav-link d-flex align-items-center gap-2 mb-1 {{ request()->routeIs('times.*') ? 'active' : '' }}">
            <i class="bi bi-shield-fill"></i> Times
        </a>

        <a href="{{ route('atletas.index') }}"
           class="nav-link d-flex align-items-center gap-2 mb-1 {{ request()->routeIs('atletas.*') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i> Atletas
        </a>

        @if(auth()->user()->tipo === 'admin')
            <div class="sidebar-label">Competições</div>
            <a href="{{ route('campeonatos.index') }}"
               class="nav-link d-flex align-items-center gap-2 mb-1 {{ request()->routeIs('campeonatos.*') ? 'active' : '' }}">
                <i class="bi bi-trophy-fill"></i> Campeonatos
            </a>
            <a href="{{ route('TabelaClassificacoes.index') }}"
               class="nav-link d-flex align-items-center gap-2 mb-1 {{ request()->routeIs('TabelaClassificacoes.*') ? 'active' : '' }}">
                <i class="bi bi-list-ol"></i> Classificação
            </a>
        @endif
    </nav>

    {{-- Perfil + Logout --}}
    <div class="px-2 py-2" style="border-top: 1px solid rgba(255,255,255,.08);">
        <div class="d-flex align-items-center gap-2 p-2 rounded-2" style="background:rgba(255,255,255,.05);">
            <div class="d-flex align-items-center justify-content-center text-white fw-bold rounded-2 flex-shrink-0"
                 style="width:32px;height:32px;font-size:13px;background:#cc0000;">
                {{ strtoupper(substr(auth()->user()->nome, 0, 1)) }}
            </div>
            <div class="flex-grow-1 overflow-hidden">
                <div class="text-white fw-semibold text-truncate" style="font-size:12.5px;">{{ auth()->user()->nome }}</div>
                <div class="text-white-50" style="font-size:10.5px;">
                    {{ auth()->user()->tipo === 'admin' ? 'Administrador' : 'Responsável' }}
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout" title="Sair">
                    <i class="bi bi-box-arrow-right" style="font-size:16px;"></i>
                </button>
            </form>
        </div>
    </div>

</aside>

{{-- Conteúdo --}}
<div class="main-content">

    <div class="topbar d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fw-bold">@yield('title', 'Painel')</h6>
        @if(auth()->user()->tipo === 'admin')
            <span class="badge text-white" style="background:#cc0000;">
                <i class="bi bi-star-fill me-1"></i>Administrador
            </span>
        @else
            <span class="badge bg-secondary">
                <i class="bi bi-person-check-fill me-1"></i>Responsável
            </span>
        @endif
    </div>

    <div class="px-4 pt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show">
                <i class="bi bi-exclamation-circle-fill me-2"></i><strong>Corrija os erros:</strong>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <div class="p-4">
        @yield('content')
    </div>

</div>

@else
    @yield('content')
@endauth

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
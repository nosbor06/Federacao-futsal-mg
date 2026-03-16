@extends('Layout.app')
@section('title', 'Dashboard')

@section('content')

<div class="mb-4">
    <h4 class="fw-bold mb-1">Olá, {{ auth()->user()->nome }}</h4>
    <p class="text-muted mb-0">Bem-vindo ao painel da Federação Mineira de Futsal.</p>
</div>

{{-- Cards de estatísticas --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                     style="width:48px;height:48px;flex-shrink:0;">
                    <i class="bi bi-shield-fill text-danger fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold lh-1">{{ \App\Models\Time::count() }}</div>
                    <div class="text-muted small">Times cadastrados</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                     style="width:48px;height:48px;flex-shrink:0;">
                    <i class="bi bi-person-fill text-warning fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold lh-1">{{ \App\Models\Atleta::count() }}</div>
                    <div class="text-muted small">Atletas registrados</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                     style="width:48px;height:48px;flex-shrink:0;">
                    <i class="bi bi-trophy-fill text-primary fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold lh-1">{{ \App\Models\Campeonato::count() }}</div>
                    <div class="text-muted small">Campeonatos</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                     style="width:48px;height:48px;flex-shrink:0;">
                    <i class="bi bi-people-fill text-danger fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold lh-1">{{ \App\Models\User::where('tipo','responsavel')->count() }}</div>
                    <div class="text-muted small">Responsáveis</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Ações rápidas + Campeonatos ativos --}}
<div class="row g-3">
    <div class="col-md-5">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold border-bottom">
                <i class="bi bi-lightning-charge-fill text-warning me-2"></i>Ações Rápidas
            </div>
            <div class="card-body p-3">
                <div class="list-group list-group-flush">
                    <a href="{{ route('times.create') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded mb-1 border">
                        <i class="bi bi-plus-circle-fill text-danger"></i> Cadastrar novo Time
                    </a>
                    <a href="{{ route('atletas.create') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded mb-1 border">
                        <i class="bi bi-person-plus-fill text-danger"></i> Cadastrar novo Atleta
                    </a>
                    <a href="{{ route('campeonatos.create') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded mb-1 border">
                        <i class="bi bi-trophy-fill text-primary"></i> Criar Campeonato
                    </a>
                    <a href="{{ route('TabelaClassificacoes.index') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded border">
                        <i class="bi bi-list-ol text-danger"></i> Ver Tabela de Classificação
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold border-bottom">
                <i class="bi bi-trophy-fill text-primary me-2"></i>Campeonatos Ativos
            </div>
            @php
                $campeonatos = \App\Models\Campeonato::whereIn('status',['inscricoes_abertas','em_andamento'])->latest()->take(5)->get();
            @endphp
            <div class="card-body p-0">
                @forelse($campeonatos as $c)
                    <div class="d-flex align-items-center justify-content-between px-3 py-3 border-bottom">
                        <div>
                            <div class="fw-semibold small">{{ $c->nome }}</div>
                            <div class="text-muted" style="font-size:12px;">{{ $c->categoria }}</div>
                        </div>
                        @if($c->status === 'inscricoes_abertas')
                            <span class="badge bg-danger">Inscrições Abertas</span>
                        @else
                            <span class="badge bg-warning text-dark">Em Andamento</span>
                        @endif
                    </div>
                @empty
                    <div class="text-center text-muted p-4">
                        <i class="bi bi-trophy d-block fs-2 mb-2 opacity-25"></i>
                        Nenhum campeonato ativo
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
@extends('Layout.app')
@section('title', 'Dashboard')

@section('content')

@php
    $meuTime      = \App\Models\Time::where('user_id', auth()->id())->first();
    $totalAtletas = \App\Models\Atleta::whereHas('time', fn($q) => $q->where('user_id', auth()->id()))->count();
    $totalTimes   = \App\Models\Time::where('user_id', auth()->id())->count();
@endphp

<div class="mb-4">
    <h4 class="fw-bold mb-1">Olá, {{ auth()->user()->nome }}</h4>
    <p class="text-muted mb-0">Gerencie seu time e atletas pelo painel abaixo.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                     style="width:48px;height:48px;flex-shrink:0;">
                    <i class="bi bi-shield-fill text-danger fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold lh-1">{{ $totalTimes }}</div>
                    <div class="text-muted small">{{ $totalTimes === 1 ? 'Time cadastrado' : 'Times cadastrados' }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center"
                     style="width:48px;height:48px;flex-shrink:0;">
                    <i class="bi bi-person-fill text-warning fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold lh-1">{{ $totalAtletas }}</div>
                    <div class="text-muted small">Atletas no meu time</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold border-bottom">
                <i class="bi bi-lightning-charge-fill text-warning me-2"></i>Ações Rápidas
            </div>
            <div class="card-body p-3">
                <div class="list-group list-group-flush">
                    <a href="{{ route('times.index') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded mb-1 border">
                        <i class="bi bi-shield-fill text-danger"></i> Ver meu Time
                    </a>
                    <a href="{{ route('atletas.index') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded mb-1 border">
                        <i class="bi bi-people-fill text-warning"></i> Ver meus Atletas
                    </a>
                    <a href="{{ route('atletas.create') }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 rounded border">
                        <i class="bi bi-person-plus-fill text-danger"></i> Cadastrar Atleta
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        @if($meuTime)
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold border-bottom">
                <i class="bi bi-shield-fill text-danger me-2"></i>Meu Time
            </div>
            <div class="card-body">
                <h5 class="fw-bold mb-3">{{ $meuTime->nome }}</h5>
                <div class="row g-3 small">
                    <div class="col-6">
                        <div class="text-muted text-uppercase fw-bold" style="font-size:10px;letter-spacing:.8px;">Cidade</div>
                        <div class="fw-semibold">{{ $meuTime->cidade }}</div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted text-uppercase fw-bold" style="font-size:10px;letter-spacing:.8px;">Ginásio</div>
                        <div class="fw-semibold">{{ $meuTime->ginasio }}</div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted text-uppercase fw-bold" style="font-size:10px;letter-spacing:.8px;">CNPJ</div>
                        <div class="fw-semibold">{{ $meuTime->cnpj }}</div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted text-uppercase fw-bold" style="font-size:10px;letter-spacing:.8px;">Atletas</div>
                        <div class="fw-semibold">{{ $totalAtletas }}</div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('times.edit', $meuTime->id) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-pencil-fill me-1"></i>Editar dados do time
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-5 text-center">
                <i class="bi bi-shield-exclamation fs-1 text-secondary opacity-25 mb-3"></i>
                <p class="text-muted mb-3">Você ainda não tem um time cadastrado.</p>
                <a href="{{ route('times.create') }}" class="btn btn-danger fw-semibold">
                    <i class="bi bi-plus-lg me-1"></i>Cadastrar meu Time
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
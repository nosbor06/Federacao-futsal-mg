@extends('Layout.app')
@section('title', 'Tabela de Artilheiros')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Tabela de Artilheiros</h5>
    <a href="{{ route('artilheiros.create') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Adicionar Artilheiro
    </a>
</div>

@if($campeonatos->count() > 0)
    @foreach($campeonatos as $campeonato)
        @php
            $artilheiros = $campeonato->artilheiros()
                ->orderBy('gols', 'desc')
                ->take(10)
                ->get();
        @endphp

        @if($artilheiros->count() > 0)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-danger text-white fw-semibold">
                    <i class="bi bi-fire me-2"></i>{{ $campeonato->nome }} - Top 10 Artilheiros
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Atleta</th>
                                <th>Time</th>
                                <th class="text-center">Gols</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artilheiros as $index => $artilheiro)
                                <tr>
                                    <td class="align-middle fw-bold">
                                        @if($index === 0) 🥇
                                        @elseif($index === 1) 🥈
                                        @elseif($index === 2) 🥉
                                        @else {{ $index + 1 }}º
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <strong>{{ $artilheiro->atleta->nome }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $artilheiro->atleta->data_nascimento }}</small>
                                    </td>
                                    <td class="align-middle">{{ $artilheiro->time->nome }}</td>
                                    <td class="text-center align-middle">
                                        <span class="badge bg-danger" style="font-size: 1rem;">{{ $artilheiro->gols }}</span>
                                    </td>
                                    <td class="text-end align-middle">
                                        <a href="{{ route('artilheiros.edit', $artilheiro->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('artilheiros.destroy', $artilheiro->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmar exclusão?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach
@else
    <div class="alert alert-info">Nenhum campeonato cadastrado</div>
@endif

@endsection
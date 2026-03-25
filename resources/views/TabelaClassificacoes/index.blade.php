@extends('Layout.app')
@section('title', 'Tabela de Classificação')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Tabela de Classificação</h5>
    <a href="{{ route('TabelaClassificacoes.create') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Adicionar Time
    </a>
</div>

@forelse($tabelaClassificacoes as $campeonatoId => $itens)
    <div class="mb-5">
        <h6 class="fw-bold text-uppercase text-danger mb-2">
            <i class="bi bi-trophy-fill me-1"></i>
            {{ $itens->first()->campeonato->nome ?? 'Campeonato removido' }}
        </h6>
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:40px;">#</th>
                            <th>Time</th>
                            <th class="text-center">Pts</th>
                            <th class="text-center">J</th>
                            <th class="text-center">V</th>
                            <th class="text-center">E</th>
                            <th class="text-center">D</th>
                            <th class="text-center">GP</th>
                            <th class="text-center">GC</th>
                            <th class="text-center">SG</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($itens as $item)
                        <tr>
                            <td class="align-middle">
                                @if($loop->index === 0) 🥇
                                @elseif($loop->index === 1) 🥈
                                @elseif($loop->index === 2) 🥉
                                @else {{ $loop->iteration }}º
                                @endif
                            </td>
                            <td class="align-middle fw-semibold">
                                @if($item->time->id)
                                    @if($item->time->escudo)
                                        @php
                                            $escudoUrl = Str::startsWith($item->time->escudo, ['http'])
                                                ? $item->time->escudo
                                                : asset('storage/' . $item->time->escudo);
                                        @endphp
                                        <img src="{{ $escudoUrl }}"
                                             style="width:24px;height:24px;object-fit:contain;margin-right:6px;">
                                    @endif
                                    {{ $item->time->nome }}
                                @else
                                    <span class="text-muted fst-italic">Time removido</span>
                                @endif
                            </td>
                            <td class="text-center align-middle fw-bold text-danger">{{ $item->pontos }}</td>
                            <td class="text-center align-middle small">{{ $item->jogos }}</td>
                            <td class="text-center align-middle small text-success">{{ $item->vitorias }}</td>
                            <td class="text-center align-middle small text-warning">{{ $item->empates }}</td>
                            <td class="text-center align-middle small text-danger">{{ $item->derrotas }}</td>
                            <td class="text-center align-middle small">{{ $item->gols_pro }}</td>
                            <td class="text-center align-middle small">{{ $item->gols_contra }}</td>
                            <td class="text-center align-middle small fw-semibold">
                                {{ $item->saldo_gols >= 0 ? '+' : '' }}{{ $item->saldo_gols }}
                            </td>
                            <td class="text-end align-middle">
                                <a href="{{ route('TabelaClassificacoes.edit', $item->id) }}"
                                   class="btn btn-sm btn-outline-secondary me-1">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('TabelaClassificacoes.destroy', $item->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Deseja excluir?')">
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
    </div>
@empty
    <div class="text-center text-muted py-5">
        <i class="bi bi-table d-block fs-2 mb-2 opacity-25"></i>
        Nenhum registro encontrado
    </div>
@endforelse

@endsection
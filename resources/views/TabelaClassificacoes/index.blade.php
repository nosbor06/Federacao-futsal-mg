@extends('Layout.app')
@section('title', 'Tabela de Classificação')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Tabela de Classificação</h5>
    <a href="{{ route('TabelaClassificacoes.create') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Adicionar Time
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Campeonato</th>
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
            @forelse($tabelaClassificacoes as $index => $item)
                <tr>
                    <td class="align-middle">
                        @if($index === 0) 🥇
                        @elseif($index === 1) 🥈
                        @elseif($index === 2) 🥉
                        @else {{ $index + 1 }}º
                        @endif
                    </td>
                    <td class="align-middle small">{{ $item->campeonato->nome }}</td>
                    <td class="align-middle fw-semibold">
                        @if($item->time->escudo)
                            <img src="{{ asset($item->time->escudo) }}"
                                 style="width:24px;height:24px;object-fit:contain;margin-right:6px;">
                        @endif
                        {{ $item->time->nome }}
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
            @empty
                <tr>
                    <td colspan="12" class="text-center text-muted py-5">
                        <i class="bi bi-table d-block fs-2 mb-2 opacity-25"></i>
                        Nenhum registro encontrado
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
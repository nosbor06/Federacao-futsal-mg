@extends('Layout.app')
@section('title', 'Campeonatos')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Campeonatos</h2>

        <a href="{{ route('campeonatos.create') }}" class="btn btn-success">Novo Campeonato</a>
    </div>

</div>

<div class="card shadow-sm">
    <div class="card-body p-0">

        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Status</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse($campeonatos as $campeonato)
                    <tr>
                        <td>{{ $campeonato->nome }}</td>
                        <td>{{ $campeonato->categoria }}</td>
                        <td>{{ $campeonato->data_inicio }}</td>
                        <td>{{ $campeonato->data_fim }}</td>

                        <td>
                            <span class="badge
                                @if($campeonato->status == 'inscricoes_abertas') bg-success
                                @elseif($campeonato->status == 'em_andamento') bg-warning
                                @else bg-secondary
                                @endif
                            ">
                                {{ ucfirst(str_replace('_',' ', $campeonato->status)) }}
                            </span>
                        </td>

                        <td class="text-end">
                            <a href="{{ route('campeonatos.edit', $campeonato->id) }}"class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{ route('campeonatos.destroy', $campeonato->id) }}"method="POST"class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"onclick="return confirm('Deseja excluir este campeonato?')">Excluir</button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Nenhum campeonato cadastrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
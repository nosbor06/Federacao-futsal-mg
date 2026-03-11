@extends('Layout.app')
@section('title','Tabela de Classificação')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Tabela de Classificação</h2>
        <a href="{{ route('tabela_classificacoes.create') }}" class="btn btn-success">Adicionar Time</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Campeonato</th>
                        <th>Time</th>
                        <th>Pontos</th>
                        <th>Jogos</th>
                        <th>Saldo</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($tabelaClassificacoes as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->campeonato->nome }}</td>
                        <td>{{ $item->time->nome }}</td>
                        <td>{{ $item->pontos }}</td>
                        <td>{{ $item->jogos }}</td>
                        <td>{{ $item->saldo_gols }}</td>

                        <td class="text-end">

                            <a href="{{ route('tabela_classificacoes.edit',$item->id) }}"
                               class="btn btn-sm btn-primary">
                               Editar
                            </a>

                            <form action="{{ route('tabela_classificacoes.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"onclick="return confirm('Deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-3">Nenhum registro encontrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
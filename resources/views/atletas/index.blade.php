@extends('Layout.app')
@section('title', 'Atletas')
@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Lista de Atletas</h2>

    <a href="{{ route('atletas.create') }}" class="btn btn-success">
        Novo Atleta
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Categoria</th>
            <th>Time</th>
            <th width="200">Ações</th>
        </tr>
    </thead>

    <tbody>

    @forelse($atletas as $atleta)

        <tr>
            <td>{{ $atleta->id }}</td>
            <td>{{ $atleta->nome }}</td>
            <td>{{ $atleta->cpf }}</td>
            <td>{{ $atleta->categoria }}</td>
            <td>{{ $atleta->time->nome ?? 'Sem Time' }}</td>

            <td>

                <a href="{{ route('atletas.edit', $atleta->id) }}" class="btn btn-primary btn-sm">
                    Editar
                </a>

                <form action="{{ route('atletas.destroy', $atleta->id) }}" method="POST" style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Excluir
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="6" class="text-center">
                Nenhum atleta cadastrado
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection
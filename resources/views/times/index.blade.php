@extends('layouts.app')

@section('title', 'Times')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Lista de Times</h2>

    <a href="{{ route('times.create') }}" class="btn btn-primary">
        Novo Time
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Cidade</th>
            <th>Ginásio</th>
            <th width="200">Ações</th>
        </tr>
    </thead>

    <tbody>

    @forelse($times as $time)

        <tr>
            <td>{{ $time->id }}</td>
            <td>{{ $time->nome }}</td>
            <td>{{ $time->cnpj }}</td>
            <td>{{ $time->cidade }}</td>
            <td>{{ $time->ginasio }}</td>

            <td>

                <a href="{{ route('times.edit', $time->id) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('times.destroy', $time->id) }}" method="POST" style="display:inline">

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
                Nenhum time cadastrado
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection
@extends('Layout.app')

@section('title', 'Cadastrar Atleta')

@section('content')

<h2 class="mb-4">Cadastrar Atleta</h2>

<form action="{{ route('atletas.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">CPF</label>
        <input type="text" name="cpf" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <input type="text" name="categoria" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Time</label>

        <select name="time_id" class="form-select" required>

            @foreach($times as $time)

                <option value="{{ $time->id }}">
                    {{ $time->nome }}
                </option>

            @endforeach

        </select>

    </div>

    <button type="submit" class="btn btn-success">
        Salvar Atleta
    </button>

    <a href="{{ route('atletas.index') }}" class="btn btn-secondary">
        Voltar
    </a>

</form>

@endsection
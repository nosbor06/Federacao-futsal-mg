@extends('Layout.app')
@section('title', 'Editar Atleta')
@section('content')

<h2 class="mb-4">Editar Atleta</h2>

<form action="{{ route('atletas.update', $atleta->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control"
        value="{{ $atleta->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">CPF</label>
        <input type="text" name="cpf" class="form-control"
        value="{{ $atleta->cpf }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control"
        value="{{ $atleta->data_nascimento }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <input type="text" name="categoria" class="form-control"
        value="{{ $atleta->categoria }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Time</label>

        <select name="time_id" class="form-select">

            @foreach($times as $time)

                <option value="{{ $time->id }}"
                {{ $atleta->time_id == $time->id ? 'selected' : '' }}>

                    {{ $time->nome }}

                </option>

            @endforeach

        </select>

    </div>

    <button type="submit" class="btn btn-primary">
        Atualizar
    </button>

    <a href="{{ route('atletas.index') }}" class="btn btn-secondary">
        Voltar
    </a>

</form>

@endsection
@extends('Layout.app')
@section('title', 'Editar Time')
@section('content')

<h2>Editar Time</h2>

<form action="{{ route('times.update', $time->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control"
        value="{{ $time->nome }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">CNPJ</label>
        <input type="text" name="cnpj" class="form-control"
        value="{{ $time->cnpj }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control"
        value="{{ $time->cidade }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ginásio</label>
        <input type="text" name="ginasio" class="form-control"
        value="{{ $time->ginasio }}" required>
    </div>

    <button class="btn btn-success">
        Atualizar
    </button>

    <a href="{{ route('times.index') }}" class="btn btn-secondary">
        Voltar
    </a>

</form>

@endsection
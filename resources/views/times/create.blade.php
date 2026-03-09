@extends('layouts.app')

@section('title', 'Cadastrar Time')

@section('content')

<h2 class="mb-4">Cadastrar Time</h2>

<form action="{{ route('times.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">CNPJ</label>
        <input type="text" name="cnpj" class="form-control" value="{{ old('cnpj') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="{{ old('cidade') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Ginásio</label>
        <input type="text" name="ginasio" class="form-control" value="{{ old('ginasio') }}">
    </div>

    <div class="mt-4">

        <!-- BOTÃO SALVAR (VERDE) -->
        <button type="submit" class="btn btn-success">
            Salvar Time
        </button>

        <!-- BOTÃO VOLTAR -->
        <a href="{{ route('times.index') }}" class="btn btn-secondary">
            Voltar
        </a>

    </div>

</form>

@endsection
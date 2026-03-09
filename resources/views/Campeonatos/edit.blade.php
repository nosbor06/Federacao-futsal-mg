@extends('Layout.app')
@section('title', 'Editar Campeonato')
@section('content')

<h2>Editar Campeonato</h2>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $erro)
            <div>{{ $erro }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('campeonatos.update', $campeonato->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Campeonato</label>
        <input type="text" class="form-control" id="nome" name="nome"value="{{ old('nome', $campeonato->nome) }}">
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" class="form-control" id="categoria" name="categoria"value="{{ old('categoria', $campeonato->categoria) }}">
    </div>

    <div class="mb-3">
        <label for="data_inicio" class="form-label">Data de Início</label>
        <input type="date" class="form-control" id="data_inicio" name="data_inicio"value="{{ old('data_inicio', $campeonato->data_inicio) }}">
    </div>

    <div class="mb-3">
        <label for="data_fim" class="form-label">Data de Fim</label>
        <input type="date" class="form-control" id="data_fim" name="data_fim"value="{{ old('data_fim', $campeonato->data_fim) }}">
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-select">

            <option value="inscricoes_abertas"{{ old('status', $campeonato->status) == 'inscricoes_abertas' ? 'selected' : '' }}>Inscrições abertas</option>

            <option value="em_andamento"{{ old('status', $campeonato->status) == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>

            <option value="finalizado"{{ old('status', $campeonato->status) == 'finalizado' ? 'selected' : '' }}>Finalizado</option>

        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>

</form>

@endsection
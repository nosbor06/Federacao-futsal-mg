@extends('Layout.app')
@section('title','Editar Classificação')
@section('content')

<div class="container mt-4">

    <h2>Editar Registro</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $erro)
            <div>{{ $erro }}</div>
        @endforeach
    </div>
    @endif

    <form method="POST"action="{{ route('tabela_classificacoes.update',$tabelaClassificacao->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Campeonato</label>
            <select name="campeonato_id" class="form-control">
                @foreach($campeonatos as $campeonato)
                    <option value="{{ $campeonato->id }}"
                        {{ $campeonato->id == $tabelaClassificacao->campeonato_id ? 'selected' : '' }}>
                        {{ $campeonato->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Time</label>
            <select name="time_id" class="form-control">
                @foreach($times as $time)
                    <option value="{{ $time->id }}"
                        {{ $time->id == $tabelaClassificacao->time_id ? 'selected' : '' }}>
                        {{ $time->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Atualizar</button>

    </form>

</div>

@endsection
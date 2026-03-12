@extends('Layout.app')
@section('title','Adicionar à Classificação')
@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Adicionar Time ao Campeonato</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('TabelaClassificacoes.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Campeonato</label>
                    <select name="campeonato_id" class="form-select" required>
                        @foreach($campeonatos as $campeonato)
                            <option value="{{ $campeonato->id }}">
                                {{ $campeonato->nome }}
                            </option>
                        @endforeach
                    </select>
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

                <div class="d-flex justify-content-between">
                    <a href="{{ route('TabelaClassificacoes.index') }}" class="btn btn-secondary">Voltar</a>

                    <button class="btn btn-success">Salvar</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
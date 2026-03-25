@extends('Layout.app')
@section('title', 'Novo Jogo')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-4">Novo Jogo</h3>

            <form action="{{ route('jogos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Campeonato</label>
                    <select name="campeonato_id" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($campeonatos as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Time Casa</label>
                    <select name="time_casa_id" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($times as $t)
                            <option value="{{ $t->id }}">{{ $t->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Time Visitante</label>
                    <select name="time_visitante_id" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach($times as $t)
                            <option value="{{ $t->id }}">{{ $t->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data e Hora</label>
                    <input type="datetime-local" name="data_hora" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-danger w-100">Criar Jogo</button>
            </form>
        </div>
    </div>
</div>

@endsection

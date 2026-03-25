@extends('Layout.app')
@section('title', 'Resultado')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-4">{{ $jogo->timeCasa->nome }} x {{ $jogo->timeVisitante->nome }}</h3>

            <form action="{{ route('jogos.update', $jogo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">{{ $jogo->timeCasa->nome }}</label>
                        <input type="number" name="gols_casa" class="form-control form-control-lg text-center" min="0" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end justify-content-center pb-3">
                        <h5>x</h5>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">{{ $jogo->timeVisitante->nome }}</label>
                        <input type="number" name="gols_visitante" class="form-control form-control-lg text-center" min="0" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-danger w-100 mt-4">Salvar Resultado</button>
            </form>
        </div>
    </div>
</div>

@endsection
@extends('Layout.app')
@section('title', 'Editar Classificação')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('TabelaClassificacoes.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i>
    </a>
    <h5 class="fw-bold mb-0">Editar Classificação</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('TabelaClassificacoes.update', $tabelaClassificacao->id) }}"
              method="POST">
            @csrf @method('PUT')
            <div class="row g-3">

                <div class="col-12">
                    <label class="form-label fw-semibold">Campeonato</label>
                    <select name="campeonato_id" class="form-select @error('campeonato_id') is-invalid @enderror">
                        @foreach($campeonatos as $campeonato)
                            <option value="{{ $campeonato->id }}"
                                @selected(old('campeonato_id', $tabelaClassificacao->campeonato_id) == $campeonato->id)>
                                {{ $campeonato->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('campeonato_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Time</label>
                    <select name="time_id" class="form-select @error('time_id') is-invalid @enderror">
                        @foreach($times as $time)
                            <option value="{{ $time->id }}"
                                @selected(old('time_id', $tabelaClassificacao->time_id) == $time->id)>
                                {{ $time->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('time_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                @foreach([
                    'jogos'      => 'Jogos',
                    'vitorias'   => 'Vitórias',
                    'empates'    => 'Empates',
                    'derrotas'   => 'Derrotas',
                    'gols_pro'   => 'Gols Pró',
                    'gols_contra'=> 'Gols Contra',
                    'saldo_gols' => 'Saldo de Gols',
                    'pontos'     => 'Pontos',
                ] as $field => $label)
                <div class="col-md-6">
                    <label class="form-label fw-semibold">{{ $label }}</label>
                    <input type="number" name="{{ $field }}"
                           class="form-control @error($field) is-invalid @enderror"
                           value="{{ old($field, $tabelaClassificacao->$field) }}"
                           {{ $field !== 'saldo_gols' ? 'min=0' : '' }}>
                    @error($field)<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                @endforeach

            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-danger px-4">
                    <i class="bi bi-check-lg me-1"></i>Atualizar
                </button>
                <a href="{{ route('TabelaClassificacoes.index') }}" class="btn btn-outline-secondary">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
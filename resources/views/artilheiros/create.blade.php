@extends('Layout.app')
@section('title', 'Adicionar Artilheiro')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('artilheiros.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-bold mb-0">Adicionar Artilheiro</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('artilheiros.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Campeonato <span class="text-danger">*</span></label>
                <select name="campeonato_id" class="form-select @error('campeonato_id') is-invalid @enderror" required>
                    <option value="">Selecione</option>
                    @foreach($campeonatos as $campeonato)
                        <option value="{{ $campeonato->id }}" @selected(old('campeonato_id') == $campeonato->id)>
                            {{ $campeonato->nome }}
                        </option>
                    @endforeach
                </select>
                @error('campeonato_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Atleta <span class="text-danger">*</span></label>
                <select name="atleta_id" class="form-select @error('atleta_id') is-invalid @enderror" required>
                    <option value="">Selecione</option>
                    @foreach($atletas as $atleta)
                        <option value="{{ $atleta->id }}" @selected(old('atleta_id') == $atleta->id)>
                            {{ $atleta->nome }}
                        </option>
                    @endforeach
                </select>
                @error('atleta_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Time <span class="text-danger">*</span></label>
                <select name="time_id" class="form-select @error('time_id') is-invalid @enderror" required>
                    <option value="">Selecione</option>
                    @foreach($times as $time)
                        <option value="{{ $time->id }}" @selected(old('time_id') == $time->id)>
                            {{ $time->nome }}
                        </option>
                    @endforeach
                </select>
                @error('time_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gols <span class="text-danger">*</span></label>
                <input type="number" name="gols" class="form-control @error('gols') is-invalid @enderror" 
                       value="{{ old('gols', 0) }}" min="0" required>
                @error('gols')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger px-4">
                    <i class="bi bi-check-lg me-1"></i>Salvar
                </button>
                <a href="{{ route('artilheiros.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
@extends('Layout.app')
@section('title', 'Editar Artilheiro')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('artilheiros.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-bold mb-0">Editar Artilheiro - {{ $artilheiro->atleta->nome }}</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('artilheiros.update', $artilheiro->id) }}" method="POST">
            @csrf @method('PUT')
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Atleta</label>
                <input type="text" class="form-control" value="{{ $artilheiro->atleta->nome }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Time</label>
                <input type="text" class="form-control" value="{{ $artilheiro->time->nome }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Campeonato</label>
                <input type="text" class="form-control" value="{{ $artilheiro->campeonato->nome }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gols <span class="text-danger">*</span></label>
                <input type="number" name="gols" class="form-control @error('gols') is-invalid @enderror" 
                       value="{{ old('gols', $artilheiro->gols) }}" min="0" required>
                @error('gols')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger px-4">
                    <i class="bi bi-check-lg me-1"></i>Atualizar
                </button>
                <a href="{{ route('artilheiros.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection
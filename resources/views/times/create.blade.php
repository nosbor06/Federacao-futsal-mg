@extends('Layout.app')
@section('title', 'Cadastrar Time')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('times.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-bold mb-0">Cadastrar Time</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('times.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Nome do Time <span class="text-danger">*</span></label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                           value="{{ old('nome') }}" required>
                    @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">CNPJ <span class="text-danger">*</span></label>
                    <input type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                           value="{{ old('cnpj') }}" required>
                    @error('cnpj')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Cidade <span class="text-danger">*</span></label>
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                           value="{{ old('cidade') }}" required>
                    @error('cidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Ginásio <span class="text-danger">*</span></label>
                    <input type="text" name="ginasio" class="form-control @error('ginasio') is-invalid @enderror"
                           value="{{ old('ginasio') }}" required>
                    @error('ginasio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Escudo do Time</label>
                    <input type="file" name="escudo" class="form-control @error('escudo') is-invalid @enderror"
                           accept="image/*">
                    <div class="form-text">JPG, PNG ou GIF. Máximo 2MB.</div>
                    @error('escudo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-danger px-4">
                    <i class="bi bi-check-lg me-1"></i>Salvar
                </button>
                <a href="{{ route('times.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
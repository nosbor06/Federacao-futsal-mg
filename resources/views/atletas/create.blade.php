@extends('Layout.app')
@section('title', 'Cadastrar Atleta')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('atletas.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-bold mb-0">Cadastrar Atleta</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('atletas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Nome Completo <span class="text-danger">*</span></label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                           value="{{ old('nome') }}" required>
                    @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">CPF <span class="text-danger">*</span></label>
                    <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
                           value="{{ old('cpf') }}" required>
                    @error('cpf')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Data de Nascimento <span class="text-danger">*</span></label>
                    <input type="date" name="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror"
                           value="{{ old('data_nascimento') }}" required>
                    @error('data_nascimento')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Categoria <span class="text-danger">*</span></label>
                    <input type="text" name="categoria" class="form-control @error('categoria') is-invalid @enderror"
                           value="{{ old('categoria') }}" placeholder="Ex: Sub-17, Adulto" required>
                    @error('categoria')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Time <span class="text-danger">*</span></label>
                    <select name="time_id" class="form-select @error('time_id') is-invalid @enderror" required>
                        <option value="">— Selecione —</option>
                        @foreach($times as $time)
                            <option value="{{ $time->id }}" {{ old('time_id') == $time->id ? 'selected' : '' }}>
                                {{ $time->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('time_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Foto do Atleta</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                           accept="image/*">
                    <div class="form-text">JPG, PNG ou GIF. Máximo 2MB.</div>
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-danger px-4">
                    <i class="bi bi-check-lg me-1"></i>Salvar
                </button>
                <a href="{{ route('atletas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
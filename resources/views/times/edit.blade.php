@extends('Layout.app')
@section('title', 'Editar Time')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('times.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-bold mb-0">Editar — {{ $time->nome }}</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('times.update', $time->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Nome do Time <span class="text-danger">*</span></label>
                    <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                           value="{{ old('nome', $time->nome) }}" required>
                    @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">CNPJ <span class="text-danger">*</span></label>
                    <input type="text" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror"
                           value="{{ old('cnpj', $time->cnpj) }}" required>
                    @error('cnpj')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Cidade <span class="text-danger">*</span></label>
                    <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror"
                           value="{{ old('cidade', $time->cidade) }}" required>
                    @error('cidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Ginásio <span class="text-danger">*</span></label>
                    <input type="text" name="ginasio" class="form-control @error('ginasio') is-invalid @enderror"
                           value="{{ old('ginasio', $time->ginasio) }}" required>
                    @error('ginasio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Alterar responsável pelo Time --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Responsável pelo Time</label>
                    <select name="responsavel_id" class="form-select @error('responsavel_id') is-invalid @enderror">
                        <option value="">Selecione um responsável</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" 
                                @selected(old('responsavel_id', $time->responsavel_id) == $usuario->id)>
                                {{ $usuario->nome }} ({{ $usuario->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('responsavel_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    @if($time->responsavel)
                        <small class="text-muted d-block mt-1">
                            <i class="bi bi-info-circle"></i>
                            Responsável atual: <strong>{{ $time->responsavel->nome }}</strong>
                        </small>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Escudo do Time</label>
                    @if($time->escudo)
                        <div class="mb-2">
                            <img src="{{ asset($time->escudo) }}"
                                 style="width:60px;height:60px;object-fit:contain;border:1px solid #dee2e6;border-radius:8px;">
                            <small class="text-muted ms-2">Escudo atual</small>
                        </div>
                    @endif
                    <input type="file" name="escudo" class="form-control @error('escudo') is-invalid @enderror"
                           accept="image/*">
                    <div class="form-text">Deixe em branco para manter o escudo atual.</div>
                    @error('escudo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-danger px-4">
                    <i class="bi bi-check-lg me-1"></i>Atualizar
                </button>
                <a href="{{ route('times.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
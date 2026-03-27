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
                <select name="campeonato_id" id="campeonato_id" class="form-select @error('campeonato_id') is-invalid @enderror" required>
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
                <select name="atleta_id" id="atleta_id" class="form-select @error('atleta_id') is-invalid @enderror" required>
                    <option value="">Selecione o campeonato primeiro</option>
                </select>
                @error('atleta_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Time <span class="text-danger">*</span></label>
                <input type="text" id="time_nome" class="form-control" placeholder="Time será preenchido automaticamente" disabled>
                <input type="hidden" name="time_id" id="time_id" value="{{ old('time_id') }}">
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

<script>
    // Dados dos atletas por campeonato
    const atletasPorCampeonato = @json($atletasPorCampeonato);

    document.getElementById('campeonato_id').addEventListener('change', function() {
        const campeonatoId = this.value;
        const atletasDisponiveis = atletasPorCampeonato[campeonatoId] || [];

        const atletaSelect = document.getElementById('atleta_id');
        atletaSelect.innerHTML = '<option value="">Selecione um atleta</option>';
        
        atletasDisponiveis.forEach(atleta => {
            const option = document.createElement('option');
            option.value = atleta.id;
            option.textContent = atleta.nome;
            option.dataset.timeId = atleta.time_id;
            option.dataset.timeNome = atleta.time_nome;
            atletaSelect.appendChild(option);
        });

        // Limpar time ao mudar campeonato
        document.getElementById('time_nome').value = '';
        document.getElementById('time_id').value = '';
    });

    document.getElementById('atleta_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const timeId = selectedOption.dataset.timeId;
        const timeNome = selectedOption.dataset.timeNome;

        if (timeId) {
            document.getElementById('time_id').value = timeId;
            document.getElementById('time_nome').value = timeNome;
        } else {
            document.getElementById('time_id').value = '';
            document.getElementById('time_nome').value = '';
        }
    });
</script>

@endsection
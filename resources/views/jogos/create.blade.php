@extends('Layout.app')
@section('title', 'Novo Jogo')
@section('content')

<div class="d-flex align-items-center gap-2 mb-4">
    <a href="{{ route('jogos.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-bold mb-0">Novo Jogo</h5>
</div>

<div class="card border-0 shadow-sm" style="max-width:600px;">
    <div class="card-body p-4">
        <form action="{{ route('jogos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Campeonato <span class="text-danger">*</span></label>
                <select name="campeonato_id" id="campeonato_id" class="form-select @error('campeonato_id') is-invalid @enderror" required>
                    <option value="">Selecione um campeonato</option>
                    @foreach($campeonatos as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }}</option>
                    @endforeach
                </select>
                @error('campeonato_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Time Casa <span class="text-danger">*</span></label>
                <select name="time_casa_id" id="time_casa_id" class="form-select @error('time_casa_id') is-invalid @enderror" required>
                    <option value="">Selecione o campeonato primeiro</option>
                </select>
                @error('time_casa_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Time Visitante <span class="text-danger">*</span></label>
                <select name="time_visitante_id" id="time_visitante_id" class="form-select @error('time_visitante_id') is-invalid @enderror" required>
                    <option value="">Selecione o campeonato primeiro</option>
                </select>
                @error('time_visitante_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Data e Hora <span class="text-danger">*</span></label>
                <input type="datetime-local" name="data_hora" class="form-control @error('data_hora') is-invalid @enderror" required>
                @error('data_hora')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-danger w-100"><i class="bi bi-check-circle me-2"></i>Criar Jogo</button>
        </form>
    </div>
</div>

<script>
    // Dados dos times por campeonato
    const timesPorCampeonato = @json($timesPorCampeonato);

    document.getElementById('campeonato_id').addEventListener('change', function() {
        const campeonatoId = this.value;
        const timesDisponiveis = timesPorCampeonato[campeonatoId] || [];

        // Atualizar selects de time casa e visitante
        const selects = ['time_casa_id', 'time_visitante_id'];
        
        selects.forEach(selectId => {
            const select = document.getElementById(selectId);
            select.innerHTML = '<option value="">Selecione um time</option>';
            
            timesDisponiveis.forEach(time => {
                const option = document.createElement('option');
                option.value = time.id;
                option.textContent = time.nome;
                select.appendChild(option);
            });
        });
    });
</script>

@endsection
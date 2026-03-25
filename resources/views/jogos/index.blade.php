@extends('Layout.app')
@section('title', 'Jogos')
@section('content')

<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h3><i class="bi bi-calendar-event"></i> Jogos</h3>
        </div>
        @if(auth()->user()->tipo == 'admin')
        <div class="col-md-4 text-end">
            <a href="{{ route('jogos.create') }}" class="btn btn-danger">
                <i class="bi bi-plus-circle"></i> Novo Jogo
            </a>
        </div>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-dark table-hover">
            <thead class="table-danger">
                <tr>
                    <th>Time Casa</th>
                    <th class="text-center">Resultado</th>
                    <th>Time Visitante</th>
                    <th>Data</th>
                    <th>Status</th>
                    @if(auth()->user()->tipo == 'admin')
                    <th class="text-center">Ação</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($jogos as $jogo)
                <tr>
                    <td><strong>{{ $jogo->timeCasa->nome }}</strong></td>
                    <td class="text-center">
                        @if($jogo->status == 'finalizado')
                            <span class="badge bg-success">{{ $jogo->gols_casa }} x {{ $jogo->gols_visitante }}</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                    <td><strong>{{ $jogo->timeVisitante->nome }}</strong></td>
                    <td>{{ date('d/m/Y H:i', strtotime($jogo->data_hora)) }}</td>
                    <td>
                        @if($jogo->status == 'finalizado')
                            <span class="badge bg-success">Finalizado</span>
                        @else
                            <span class="badge bg-warning">Agendado</span>
                        @endif
                    </td>
                    @if(auth()->user()->tipo == 'admin' && $jogo->status == 'agendado')
                    <td class="text-center">
                        <a href="{{ route('jogos.edit', $jogo->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Resultado
                        </a>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Nenhum jogo cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
@extends('Layout.app')
@section('title', 'Times')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Times <span class="text-muted fw-normal fs-6">({{ $times->count() }})</span></h5>
    <a href="{{ route('times.create') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Novo Time
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width:60px;">Escudo</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Cidade</th>
                    <th>Ginásio</th>
                    @if(auth()->user()->tipo === 'admin')<th>Responsável</th>@endif
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($times as $time)
                <tr>
                    <td>
                        @if($time->escudo)
                            <img src="{{ asset($time->escudo) }}"
                                 style="width:40px;height:40px;object-fit:contain;border-radius:6px;">
                        @else
                            <div class="bg-light rounded-2 d-flex align-items-center justify-content-center"
                                 style="width:40px;height:40px;">
                                <i class="bi bi-shield text-secondary"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold align-middle">{{ $time->nome }}</td>
                    <td class="align-middle"><code>{{ $time->cnpj }}</code></td>
                    <td class="align-middle">{{ $time->cidade }}</td>
                    <td class="align-middle">{{ $time->ginasio }}</td>
                    @if(auth()->user()->tipo === 'admin')
                        <td class="align-middle text-muted small">{{ $time->user->nome ?? '—' }}</td>
                    @endif
                    <td class="text-end align-middle">
                        <a href="{{ route('times.edit', $time->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        @if(auth()->user()->tipo === 'admin')
                        <form action="{{ route('times.destroy', $time->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Excluir {{ addslashes($time->nome) }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="bi bi-shield-slash d-block fs-2 mb-2 opacity-25"></i>
                        Nenhum time cadastrado
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
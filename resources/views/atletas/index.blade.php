@extends('Layout.app')
@section('title', 'Atletas')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Atletas <span class="text-muted fw-normal fs-6">({{ $atletas->count() }})</span></h5>
    <a href="{{ route('atletas.create') }}" class="btn btn-danger btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Novo Atleta
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width:60px;">Foto</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Nascimento</th>
                    <th>Categoria</th>
                    <th>Time</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($atletas as $atleta)
                <tr>
                    <td class="align-middle">
                        @if($atleta->foto)
                            <img src="{{ asset($atleta->foto) }}"
                                 style="width:40px;height:40px;object-fit:cover;border-radius:50%;">
                        @else
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                 style="width:40px;height:40px;">
                                <i class="bi bi-person text-secondary"></i>
                            </div>
                        @endif
                    </td>
                    <td class="fw-semibold align-middle">{{ $atleta->nome }}</td>
                    <td class="align-middle"><code>{{ $atleta->cpf }}</code></td>
                    <td class="align-middle small">{{ \Carbon\Carbon::parse($atleta->data_nascimento)->format('d/m/Y') }}</td>
                    <td class="align-middle">
                        <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold">{{ $atleta->categoria }}</span>
                    </td>
                    <td class="align-middle small">{{ $atleta->time->nome ?? '—' }}</td>
                    <td class="text-end align-middle">
                        <a href="{{ route('atletas.edit', $atleta->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('atletas.destroy', $atleta->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Excluir {{ addslashes($atleta->nome) }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="bi bi-person-slash d-block fs-2 mb-2 opacity-25"></i>
                        Nenhum atleta cadastrado
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('Layout.app')
@section('title', 'Cadastrar Campeonato')
@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Cadastrar Campeonato</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('campeonatos.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nome do Campeonato</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categoria</label>
                        <input type="text" name="categoria" class="form-control" required>
                    </div>
                </div>

                <!-- Datas -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Data de Início</label>
                        <input type="date" name="data_inicio" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Data de Fim</label>
                        <input type="date" name="data_fim" class="form-control" required>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="inscricoes_abertas">Inscrições abertas</option>
                        <option value="em_andamento">Em andamento</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('campeonatos.index') }}" class="btn btn-secondary">Voltar</a>

                    <button class="btn btn-success">Salvar</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
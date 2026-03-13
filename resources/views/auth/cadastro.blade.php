@extends('Layout.app')

@section('title', 'Cadastro')

@section('content')

<div class="container mt-5">

    <div class="card bg-dark text-white">

        <div class="card-header bg-black text-white">
            <h4>Cadastro</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('cadastro') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome"
                           class="form-control bg-secondary text-white border-0"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           class="form-control bg-secondary text-white border-0"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password"
                           class="form-control bg-secondary text-white border-0"
                           required>
                </div>

                {{-- ✅ CAMPO QUE FALTAVA --}}
                <div class="mb-3">
                    <label class="form-label">Tipo de usuário</label>
                    <select name="tipo"
                            class="form-control bg-secondary text-white border-0"
                            required>
                        <option value="">Selecione</option>
                        <option value="admin">Administrador</option>
                        <option value="responsavel">Responsável</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-light">
                    Cadastrar
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
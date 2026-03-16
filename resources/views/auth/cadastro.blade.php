<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center py-4">

    {{-- Nome da federação --}}
    <p class="text-white fw-bold fs-5 mb-3"> Federação Mineira de Futsal</p>

    <div class="card bg-dark text-white shadow" style="width: 450px; border: 1px solid #444;">

        <div class="card-header bg-black text-white">
            <h4 class="mb-0">Cadastro</h4>
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('cadastro.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome"
                           class="form-control bg-secondary text-white border-0 @error('nome') is-invalid @enderror"
                           value="{{ old('nome') }}" required>
                    @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           class="form-control bg-secondary text-white border-0 @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password"
                           class="form-control bg-secondary text-white border-0 @error('password') is-invalid @enderror"
                           required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Tipo de usuário</label>
                    <select name="tipo"
                            class="form-select bg-secondary text-white border-0 @error('tipo') is-invalid @enderror"
                            required>
                        <option value="">Selecione</option>
                        <option value="admin"       {{ old('tipo') === 'admin'       ? 'selected' : '' }}>Administrador</option>
                        <option value="responsavel" {{ old('tipo') === 'responsavel' ? 'selected' : '' }}>Responsável</option>
                    </select>
                    @error('tipo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-danger w-100">
                    Cadastrar
                </button>

            </form>

            <hr style="border-color: #444;">

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-white-50">
                    Já tem conta? <span class="text-white">Fazer login</span>
                </a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
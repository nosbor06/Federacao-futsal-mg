<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">

    {{-- Nome da federação --}}
    <p class="text-white fw-bold fs-5 mb-3">Federação Mineira de Futsal</p>

    <div class="card bg-dark text-white shadow" style="width: 400px; border: 1px solid #444;">

        <div class="card-header bg-black text-white text-center">
            <h4 class="mb-0">Recuperar Senha</h4>
        </div>

        <div class="card-body">

            {{-- Mensagens de Erro --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Erro!</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Mensagem de Sucesso --}}
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Instruções --}}
            <p class="text-white-50 small mb-4">
                Digite seu email registrado e enviaremos um link para redefinir sua senha.
            </p>

            {{-- Formulário --}}
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" 
                           name="email"
                           class="form-control bg-secondary text-white border-0 @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" 
                           required 
                           autofocus>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger w-100 mb-3">
                    Enviar Link de Recuperação
                </button>

            </form>

            <hr style="border-color: #444;">

            {{-- Links de Navegação --}}
            <div class="text-center">
                <a href="{{ route('login') }}" class="text-white-50 d-block mb-2">
                    Voltar ao <span class="text-white">Login</span>
                </a>
                <a href="{{ route('cadastro') }}" class="text-white-50">
                    Não tem conta? <span class="text-white">Criar conta</span>
                </a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
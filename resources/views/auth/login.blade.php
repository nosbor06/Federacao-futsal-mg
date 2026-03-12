<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card bg-dark text-white shadow" style="width: 400px; border: 1px solid #444;">

        <div class="card-header bg-black text-white text-center">
            <h4>Login</h4>
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control bg-secondary text-white border-0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control bg-secondary text-white border-0" required>
                </div>

                <button type="submit" class="btn btn-light w-100">
                    Entrar
                </button>

            </form>

            <div class="text-center mt-3">
                <a href="/cadastro" class="text-white">
                    Criar conta
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>
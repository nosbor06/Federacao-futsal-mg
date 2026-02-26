<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Time - Federação de Futsal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #0d0d0d;
            color: white;
        }

        header {
            background: linear-gradient(90deg, #8b0000, #000000);
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #ff0000;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 18px;
            background-color: #b30000;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #ff0000;
        }

        .error {
            background-color: #8b0000;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        a {
            color: #ff4d4d;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    <h1>🏆 Editar Time</h1>
</header>

<div class="container">

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('times.update', $times->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome do Time</label>
        <input type="text" name="nome" value="{{ old('nome', $times->nome) }}" required>

        <label>CNPJ</label>
        <input type="text" name="cnpj" value="{{ old('cnpj', $times->cnpj) }}" required>

        <label>Cidade</label>
        <input type="text" name="cidade" value="{{ old('cidade', $times->cidade) }}" required>

        <label>Ginásio</label>
        <input type="text" name="ginasio" value="{{ old('ginasio', $times->ginasio) }}" required>

        <button type="submit" class="btn">Atualizar</button>
        <a href="{{ route('times.index') }}">Cancelar</a>
    </form>

</div>

</body>
</html>
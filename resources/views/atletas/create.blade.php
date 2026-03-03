<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Federação de Futsal - Cadastrar Atleta</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #0f0f0f;
            color: white;
        }

        header {
            background: #b30000;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            width: 50%;
            margin: 40px auto;
            background: #1a1a1a;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px #b30000;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            background: #b30000;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #ff1a1a;
        }

        a {
            color: #ff4d4d;
            text-decoration: none;
        }
    </style>
</head>
<body>

<header>
    Federação Paulista de Futsal ⚽
</header>

<div class="container">
    <h2>Cadastrar Novo Atleta</h2>

    <form action="{{ route('atletas.store') }}" method="POST">
        @csrf

        <label>Nome</label>
        <input type="text" name="nome" required>

        <label>CPF</label>
        <input type="text" name="cpf" required>

        <label>Data de Nascimento</label>
        <input type="date" name="data_nascimento" required>

        <label>Categoria</label>
        <input type="text" name="categoria" required>

        <label>Time</label>
        <select name="time_id" required>
            @foreach($times as $time)
                <option value="{{ $time->id }}">
                    {{ $time->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Cadastrar Atleta</button>
    </form>

    <br>
    <a href="{{ route('atletas.index') }}">Voltar</a>
</div>

</body>
</html>
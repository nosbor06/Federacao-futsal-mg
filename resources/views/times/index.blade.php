<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Federação de Futsal - Times</title>
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

        header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 2px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background-color: #b30000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #ff0000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #1a1a1a;
        }

        table th {
            background-color: #8b0000;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #333;
        }

        table tr:hover {
            background-color: #262626;
        }

        .actions a {
            margin-right: 8px;
            color: #ff4d4d;
            text-decoration: none;
            font-weight: bold;
        }

        .actions a:hover {
            color: white;
        }

        .success {
            background-color: #006400;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: black;
            border-top: 2px solid #8b0000;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <h1>🏆 Federação Nacional de Futsal</h1>
</header>

<div class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('times.create') }}" class="btn">
        + Cadastrar Novo Time
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Cidade</th>
                <th>Ginásio</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($times as $time)
                <tr>
                    <td>{{ $time->id }}</td>
                    <td>{{ $time->nome }}</td>
                    <td>{{ $time->cnpj }}</td>
                    <td>{{ $time->cidade }}</td>
                    <td>{{ $time->ginasio }}</td>
                    <td class="actions">
                        <a href="{{ route('times.edit', $time->id) }}">Editar</a>

                        <form action="{{ route('times.destroy', $time->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background:none;border:none;color:#ff4d4d;font-weight:bold;cursor:pointer;">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum time cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

<footer>
    © {{ date('Y') }} Federação Nacional de Futsal - Sistema Oficial
</footer>

</body>
</html>
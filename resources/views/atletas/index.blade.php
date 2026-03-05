<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Federação de Futsal - Atletas</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
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
            width: 80%;
            margin: 40px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #1a1a1a;
        }

        th {
            background: #b30000;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #262626;
        }

        a.button {
            background: #b30000;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a.button:hover {
            background: #ff1a1a;
        }

        .top {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<header>
    Federação Paulista de Futsal ⚽
</header>

<div class="container">

    <div class="top">
        <a href="{{ route('atletas.create') }}" class="button">+ Novo Atleta</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Categoria</th>
                <th>Time</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atletas as $atleta)
            <tr>
                <td>{{ $atleta->id }}</td>
                <td>{{ $atleta->nome }}</td>
                <td>{{ $atleta->cpf }}</td>
                <td>{{ $atleta->categoria }}</td>
                <td>{{ $atleta->time->nome ?? 'Sem Time' }}</td>
                <td>
                    <a href="{{ route('atletas.edit', $atleta->id) }}" class="button">Editar</a>

                    <form action="{{ route('atletas.destroy', $atleta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button style="background:#660000;color:white;border:none;padding:5px 10px;border-radius:4px;cursor:pointer;">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
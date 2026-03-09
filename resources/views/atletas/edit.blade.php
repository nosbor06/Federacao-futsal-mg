<form action="{{ route('atletas.update', $atleta->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome</label>
    <input type="text" name="nome" value="{{ $atleta->nome }}" required>

    <label>CPF</label>
    <input type="text" name="cpf" value="{{ $atleta->cpf }}" required>

    <label>Data de Nascimento</label>
    <input type="date" name="data_nascimento" value="{{ $atleta->data_nascimento }}" required>

    <label>Categoria</label>
    <input type="text" name="categoria" value="{{ $atleta->categoria }}" required>

    <label>Time</label>
    <select name="time_id">
        @foreach($times as $time)
            <option value="{{ $time->id }}"
                {{ $atleta->time_id == $time->id ? 'selected' : '' }}>
                {{ $time->nome }}
            </option>
        @endforeach
    </select>

    <button type="submit">Atualizar Atleta</button>
</form>
<form method="POST" action="/forgot-password">
    @csrf
    <input type="email" name="email" required>
    <button type="submit">Enviar</button>
</form>
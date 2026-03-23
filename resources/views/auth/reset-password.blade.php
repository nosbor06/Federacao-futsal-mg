<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="Nova senha" required>

    <input type="password" name="password_confirmation" placeholder="Confirmar senha" required>

    <button type="submit">Redefinir senha</button>
</form>
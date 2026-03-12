<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel Administrador</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-dark text-white">

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card bg-black text-white shadow">

<div class="card-header text-center">
<h4>Painel do Administrador</h4>
</div>

<div class="card-body">

<div class="d-grid gap-3">

<a href="/times" class="btn btn-outline-light">
Gerenciar Times
</a>

<a href="/atletas" class="btn btn-outline-light">
Gerenciar Atletas
</a>

<a href="/campeonatos" class="btn btn-outline-light">
Gerenciar Campeonatos
</a>

<form action="/logout" method="POST">
@csrf
<button class="btn btn-danger w-100">
Sair
</button>
</form>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
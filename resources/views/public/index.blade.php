@extends('Layout2.app')

@section('title','Plataforma Futsal')

@section('content')

<h1 class="text-center mb-5">Tabela de Classificação</h1>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Time</th>
            <th>Pontos</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela as $item)
        <tr>
            <td>{{ $item->time->nome ?? 'Sem nome' }}</td>
            <td>{{ $item->pontos }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2 class="mt-5 mb-4 text-center">Notícias</h2>

<div class="row">

@forelse($noticias as $noticia)
     <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">

                    {{-- Imagem da notícia ou placeholder --}}
                    <img src="{{ $noticia['urlToImage'] ?? 'https://via.placeholder.com/400x200?text=Futsal' }}" 
                         class="card-img-top" 
                         style="height:200px; object-fit:cover;">

                    <div class="card-body d-flex flex-column">
                        {{-- Título --}}
                        <h5 class="card-title">{{ $noticia['title'] ?? 'Sem título' }}</h5>

                        {{-- Descrição --}}
                        <p class="card-text text-muted">
                            {{ $noticia['description'] ?? 'Sem descrição' }}
                        </p>

                        {{-- Data de publicação --}}
                        <small class="text-muted mb-2">
                            {{ isset($noticia['publishedAt']) ? date('d/m/Y H:i', strtotime($noticia['publishedAt'])) : '' }}
                        </small>

                        {{-- Link para a notícia original --}}
                        <a href="{{ $noticia['url'] ?? '#' }}" target="_blank" class="btn btn-danger mt-auto">
                            Ler notícia
                        </a>
                    </div>

                </div>
            </div>
@empty
    <p class="text-center">Nenhuma notícia encontrada.</p>
@endforelse

</div>

@endsection
@extends('Layout.app')

@section('title','Notícias de Futsal')

@section('content')

<div class="container-fluid">

    <h4 class="mb-4">📰 Notícias de Futsal</h4>

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
            <div class="col-12">
                <p class="text-center text-muted">Nenhuma notícia encontrada.</p>
            </div>
        @endforelse

    </div>

</div>

@endsection
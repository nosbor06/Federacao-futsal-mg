@extends('Layout2.app')

@section('title','Plataforma Futsal')

@section('tabelas')

<h2 class="section-title">
    <i class="bi bi-list-ol"></i>Tabelas de Classificação
</h2>

@if(isset($tabelasPorCampeonato) && count($tabelasPorCampeonato) > 0)

    @foreach($tabelasPorCampeonato as $campId => $data)
        @php
            $campeonato = $data['campeonato'];
            $classificacoes = $data['classificacoes'];
        @endphp

        <div class="campeonato-header">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4><i class="bi bi-flag-fill me-2"></i>{{ $campeonato->nome }}</h4>
                    <small class="text-muted">
                        <i class="bi bi-tag me-1"></i>{{ $campeonato->categoria }}
                        @if($campeonato->status === 'em_andamento')
                            <span class="badge bg-warning text-dark ms-2">⏱️ Em Andamento</span>
                        @elseif($campeonato->status === 'inscricoes_abertas')
                            <span class="badge bg-success ms-2">📝 Inscrições Abertas</span>
                        @else
                            <span class="badge bg-secondary ms-2">✅ Encerrado</span>
                        @endif
                    </small>
                </div>
            </div>
        </div>

        <!-- Pódio (Top 3) -->
        @if(count($classificacoes) >= 3)
            <div class="podium-container">
                <!-- 2º Lugar -->
                @php $segundo = $classificacoes->get(1); @endphp
                @if($segundo)
                    <div class="podium-item">
                        <div class="podium-medal">🥈</div>
                        @if($segundo->time->escudo)
                            @php
                                $escudoUrl = Str::startsWith($segundo->time->escudo, ['images/', 'http'])
                                    ? asset($segundo->time->escudo)
                                    : asset('storage/' . $segundo->time->escudo);
                            @endphp
                            <img src="{{ $escudoUrl }}" class="podium-escudo">
                        @endif
                        <div class="fw-bold">{{ $segundo->time->nome }}</div>
                        <small class="text-muted">{{ $segundo->pontos }} pts</small>
                    </div>
                @endif

                <!-- 1º Lugar -->
                @php $primeiro = $classificacoes->get(0); @endphp
                @if($primeiro)
                    <div class="podium-item">
                        <div class="podium-medal first">🥇</div>
                        @if($primeiro->time->escudo)
                            @php
                                $escudoUrl = Str::startsWith($primeiro->time->escudo, ['images/', 'http'])
                                    ? asset($primeiro->time->escudo)
                                    : asset('storage/' . $primeiro->time->escudo);
                            @endphp
                            <img src="{{ $escudoUrl }}" class="podium-escudo">
                        @endif
                        <div class="fw-bold" style="color: var(--primary-color);">{{ $primeiro->time->nome }}</div>
                        <small class="text-muted fw-bold">{{ $primeiro->pontos }} pts</small>
                    </div>
                @endif

                <!-- 3º Lugar -->
                @php $terceiro = $classificacoes->get(2); @endphp
                @if($terceiro)
                    <div class="podium-item">
                        <div class="podium-medal">🥉</div>
                        @if($terceiro->time->escudo)
                            @php
                                $escudoUrl = Str::startsWith($terceiro->time->escudo, ['images/', 'http'])
                                    ? asset($terceiro->time->escudo)
                                    : asset('storage/' . $terceiro->time->escudo);
                            @endphp
                            <img src="{{ $escudoUrl }}" class="podium-escudo">
                        @endif
                        <div class="fw-bold">{{ $terceiro->time->nome }}</div>
                        <small class="text-muted">{{ $terceiro->pontos }} pts</small>
                    </div>
                @endif
            </div>
        @endif

        <!-- Tabela Completa -->
        <div class="table-responsive mb-5">
            <table class="table table-bordered bg-white">
                <thead style="background-color: var(--primary-color); color: white;">
                    <tr>
                        <th style="width: 50px; text-align: center;">#</th>
                        <th>Time</th>
                        <th style="text-align: center; width: 80px;">Pts</th>
                        <th style="text-align: center; width: 60px;">J</th>
                        <th style="text-align: center; width: 60px;">V</th>
                        <th style="text-align: center; width: 60px;">E</th>
                        <th style="text-align: center; width: 60px;">D</th>
                        <th style="text-align: center; width: 60px;">GP</th>
                        <th style="text-align: center; width: 60px;">GC</th>
                        <th style="text-align: center; width: 70px;">SG</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classificacoes as $index => $item)
                        <tr>
                            <!-- Posição -->
                            <td style="text-align: center; font-weight: bold; font-size: 1.1rem;">
                                @if($index === 0) 🥇 
                                @elseif($index === 1) 🥈 
                                @elseif($index === 2) 🥉 
                                @else 
                                    <span style="color: var(--primary-color);">{{ $index + 1 }}º</span>
                                @endif
                            </td>

                            <!-- Nome do Time com Escudo -->
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    @if($item->time->escudo)
                                        @php
                                            $escudoUrl = Str::startsWith($item->time->escudo, ['images/', 'http'])
                                                ? asset($item->time->escudo)
                                                : asset('storage/' . $item->time->escudo);
                                        @endphp
                                        <img src="{{ $escudoUrl }}" 
                                             style="width: 32px; height: 32px; object-fit: contain;">
                                    @else
                                        <i class="bi bi-shield text-secondary"></i>
                                    @endif
                                    <span style="font-weight: 600;">{{ $item->time->nome }}</span>
                                </div>
                            </td>

                            <!-- Pontos -->
                            <td style="text-align: center; font-weight: bold; color: var(--primary-color);">
                                {{ $item->pontos }}
                            </td>

                            <!-- Estatísticas -->
                            <td style="text-align: center;">{{ $item->jogos }}</td>
                            <td style="text-align: center; color: #28a745;"><strong>{{ $item->vitorias }}</strong></td>
                            <td style="text-align: center; color: #ffc107;"><strong>{{ $item->empates }}</strong></td>
                            <td style="text-align: center; color: #dc3545;"><strong>{{ $item->derrotas }}</strong></td>
                            <td style="text-align: center;">{{ $item->gols_pro }}</td>
                            <td style="text-align: center;">{{ $item->gols_contra }}</td>
                            <td style="text-align: center; font-weight: bold;">
                                <span style="color: {{ $item->saldo_gols >= 0 ? '#28a745' : '#dc3545' }};">
                                    {{ $item->saldo_gols >= 0 ? '+' : '' }}{{ $item->saldo_gols }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" style="text-align: center; padding: 30px; color: #999;">
                                <i class="bi bi-inbox" style="font-size: 2rem; margin-bottom: 10px; display: block; opacity: 0.5;"></i>
                                <p>Nenhum time classificado neste campeonato ainda</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    @endforeach

@else
    <div class="alert alert-info d-flex align-items-center" role="alert" style="background-color: #e3f2fd; border-color: #90caf9; color: #1565c0;">
        <i class="bi bi-info-circle me-2" style="font-size: 1.3rem;"></i>
        <div>
            <strong>Nenhum campeonato ativo</strong> - Volte em breve para acompanhar os campeonatos da Federação Mineira de Futsal!
        </div>
    </div>
@endif

@endsection

@section('content')

<h2 class="section-title">
    <i class="bi bi-newspaper"></i>Notícias
</h2>

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


<!-- ARTILHEIROS -->
@if(isset($artilheiros))
    @foreach($artilheiros as $campId => $tops)
        @if($tops->count() > 0)
            <div class="mb-5">
                <h5 style="color: var(--primary-color); font-weight: bold; margin-top: 2rem;">
                    <i class="bi bi-fire me-2"></i>Top Artilheiros
                </h5>
                <div class="table-responsive">
                    <table class="table table-bordered bg-white">
                        <thead style="background-color: var(--primary-color); color: white;">
                            <tr>
                                <th style="width: 50px; text-align: center;">#</th>
                                <th>Atleta</th>
                                <th>Time</th>
                                <th style="text-align: center; width: 80px;">Gols</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tops as $index => $artilheiro)
                                <tr>
                                    <td style="text-align: center; font-weight: bold; font-size: 1.1rem;">
                                        @if($index === 0) 🥇 @elseif($index === 1) 🥈 @elseif($index === 2) 🥉 @else {{ $index + 1 }}º @endif
                                    </td>
                                    <td>
                                        <strong>{{ $artilheiro->atleta->nome }}</strong>
                                    </td>
                                    <td>{{ $artilheiro->time->nome }}</td>
                                    <td style="text-align: center; font-weight: bold; color: var(--primary-color);">
                                        {{ $artilheiro->gols }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach
@endif

@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use App\Models\TabelaClassificacao;
use Illuminate\Support\Facades\Http;
use App\Models\Artilheiro;


class PublicController extends Controller
{
    public function index()
    {
        // Buscar campeonatos ativos
        $campeonatos = Campeonato::where('status', 'em_andamento')
            ->orWhere('status', 'inscricoes_abertas')
            ->orderBy('created_at', 'desc')
            ->get();

        // Preparar dados das tabelas por campeonato
        $tabelasPorCampeonato = [];

        foreach ($campeonatos as $campeonato) {
            $classificacoes = TabelaClassificacao::where('campeonato_id', $campeonato->id)
                ->orderBy('pontos', 'desc')
                ->orderBy('saldo_gols', 'desc')
                ->take(20) // Top 20 times
                ->get();

            $tabelasPorCampeonato[$campeonato->id] = [
                'campeonato' => $campeonato,
                'classificacoes' => $classificacoes
            ];
        }

        // Buscar notícias de futsal
        $apiKey = '589ee279cb1b489a87fefd1820549fc6';

        $response = Http::timeout(5)->withoutVerifying()->get('https://newsapi.org/v2/everything', [
            'q' => 'futsal OR "liga nacional futsal" OR "campeonato brasileiro de futsal"',
            'language' => 'pt',
            'sortBy' => 'publishedAt',
            'apiKey' => $apiKey,
        ]);

        if ($response->successful()) {
            $dados = $response->json();
            $noticias = $dados['articles'] ?? [];
            $noticias = array_slice($noticias, 0, 100);
        } else {
            $noticias = [];
        }

        return view('public.index', compact('tabelasPorCampeonato', 'noticias'));


        // Na função index(), adicione:
        $artilheiros = [];
        foreach ($campeonatos as $campeonato) {
            $artilheiros[$campeonato->id] = Artilheiro::where('campeonato_id', $campeonato->id)
                ->orderBy('gols', 'desc')
                ->take(10)
                ->get();
        }

        return view('public.index', compact('tabelasPorCampeonato', 'noticias', 'artilheiros'));
    }


}
<?php

namespace App\Http\Controllers;

use App\Models\TabelaClassificacao;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    public function index()
{
    $tabela = TabelaClassificacao::orderBy('pontos', 'desc')->get();

    $apiKey = '589ee279cb1b489a87fefd1820549fc6';

    $response = Http::timeout(5)->withoutVerifying()->get('https://newsapi.org/v2/everything', [
        'q'        => 'futsal OR "liga nacional futsal" OR "campeonato brasileiro de futsal"',
        'language' => 'pt',
        'sortBy'   => 'publishedAt',
        'apiKey'   => $apiKey,
    ]);

    if ($response->successful()) {
        $dados = $response->json();
        $noticias = $dados['articles'] ?? [];
        $noticias = array_slice($noticias, 0, 6);
    } else {
        $noticias = [];
    }

    return view('public.index', compact('tabela', 'noticias'));
}
}
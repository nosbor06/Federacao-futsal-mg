<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NoticiaController extends Controller
{
    public function index()
    {
        $apiKey = '589ee279cb1b489a87fefd1820549fc6';

        $response = Http::withoutVerifying()->get('https://newsapi.org/v2/everything', [
            'q'        => 'futsal OR "liga nacional futsal" OR "campeonato brasileiro de futsal"',
            'language' => 'pt',
            'sortBy'   => 'publishedAt',
            'apiKey'   => $apiKey,
        ]);

        $dados = $response->json();
        $noticias = $dados['articles'] ?? [];

        return view('noticia.noticia', compact('noticias'));
    }
}
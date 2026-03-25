<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use App\Models\TabelaClassificacao;

class TabelaClassificacaoController extends Controller
{
    public function index()
    {
        // Agrupa por campeonato, já ordenado por pontos dentro de cada um
       $tabelaClassificacoes = TabelaClassificacao::with(['campeonato', 'time'])
    ->orderBy('campeonato_id')
    ->orderByDesc('pontos')
    ->get()
    ->groupBy('campeonato_id');

        return view('TabelaClassificacoes.index', compact('tabelaClassificacoes'));
    }

    public function create()
    {
        $campeonatos = Campeonato::all();
        $times = Time::all();

        return view('TabelaClassificacoes.create', compact('campeonatos', 'times'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'campeonato_id' => ['required', 'exists:campeonatos,id'],
            'time_id' => ['required', 'exists:times,id'],
        ]);

        TabelaClassificacao::create($validated);

        return redirect()->route('TabelaClassificacoes.index')->with('success', 'O time foi adicionado à tabela!');
    }

    public function edit(TabelaClassificacao $tabelaClassificacao)
    {
        $campeonatos = Campeonato::all();
        $times = Time::all();

        return view('TabelaClassificacoes.edit', compact('tabelaClassificacao', 'campeonatos', 'times'));
    }

    public function update(Request $request, TabelaClassificacao $tabelaClassificacao)
    {
        $validated = $request->validate([
            'campeonato_id' => ['required', 'exists:campeonatos,id'],
            'time_id' => ['required', 'exists:times,id'],
            'jogos' => ['required', 'integer', 'min:0'],
            'vitorias' => ['required', 'integer', 'min:0'],
            'empates' => ['required', 'integer', 'min:0'],
            'derrotas' => ['required', 'integer', 'min:0'],
            'gols_pro' => ['required', 'integer', 'min:0'],
            'gols_contra' => ['required', 'integer', 'min:0'],
            'saldo_gols' => ['required', 'integer'],
            'pontos' => ['required', 'integer', 'min:0'],
        ]);

        $tabelaClassificacao->update($validated);

        return redirect()->route('TabelaClassificacoes.index')->with('success', 'Registro atualizado!');
    }
    public function destroy(TabelaClassificacao $tabelaClassificacao)
    {
        $tabelaClassificacao->delete();

        return redirect()->route('TabelaClassificacoes.index')->with('success', 'Registro atualizado!');
    }
}

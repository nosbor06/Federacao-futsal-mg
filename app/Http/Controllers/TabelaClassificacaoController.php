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
        try{
            $tabela_classificacoes = TabelaClassificacao::with(['campeonatos', 'times', ])->orderByDesc('pontos')->get();
        }catch(error){
            $tabela_classificacao = null;
        }

        return view('tabela_classificacoes.index', compact('tabela_classificacoes'));
    }

    public function create()
    {
        $campeonatos = Campeonato::all();
        $times = Time::all();

        return view('tabela_classificacoes.create', compact('campeonatos','times'));
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
            'campeonato_id' => ['required','exists:campeonatos,id'],
            'time_id' => ['required','exists:times,id'],
        ]);

        TabelaClassificacao::create($validated);

        return redirect()->route('tabela_classificacoes.index')->with('success','O time foi adicionado à tabela!');
    }

    public function edit(TabelaClassificacao $tabelaClassificacao)
    {
        $campeonatos = Campeonato::all();
        $times = Time::all();

        return view('tabela_classificacoes.edit', compact('tabelaClassificacao','campeonatos','times'));
    }

    public function update(Request $request, TabelaClassificacao $tabelaClassificacao)
    {
        $validated = $request->validate([
            'campeonato_id' => ['required','exists:campeonatos,id'],
            'time_id' => ['required','exists:times,id'],
        ]);

        $tabelaClassificacao->update($validated);

        return redirect()->route('tabela_classificacoes.index')->with('success','Registro atualizado!');
    }

    public function destroy(TabelaClassificacao $tabelaClassificacao)
    {
        $tabelaClassificacao->delete();

        return redirect()->route('tabela_classificacoes.index')->with('success','Registro atualizado!');
    }
}

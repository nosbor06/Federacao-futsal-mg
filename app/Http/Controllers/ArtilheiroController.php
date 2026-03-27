<?php

namespace App\Http\Controllers;

use App\Models\Artilheiro;
use App\Models\Campeonato;
use App\Models\Atleta;
use App\Models\Time;
use App\Models\TabelaClassificacao;
use Illuminate\Http\Request;

class ArtilheiroController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::all();
        
        return view('artilheiros.index', compact('campeonatos'));
    }

    public function create()
    {
        $campeonatos = Campeonato::where('status', 'em_andamento')->get();
        $atletas = Atleta::all();
        $times = Time::all();
        
        // Preparar atletas agrupados por campeonato
        $atletasPorCampeonato = [];
        foreach ($campeonatos as $campeonato) {
            $atletasDoC = TabelaClassificacao::where('campeonato_id', $campeonato->id)
                ->with('time')
                ->get()
                ->pluck('time_id')
                ->toArray();

            $atletasPorCampeonato[$campeonato->id] = Atleta::whereIn('time_id', $atletasDoC)
                ->with('time')
                ->get()
                ->map(fn($atleta) => [
                    'id' => $atleta->id,
                    'nome' => $atleta->nome,
                    'time_id' => $atleta->time_id,
                    'time_nome' => $atleta->time->nome,
                ])
                ->values();
        }
        
        return view('artilheiros.create', compact('campeonatos', 'atletas', 'times', 'atletasPorCampeonato'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
            'atleta_id' => 'required|exists:atletas,id',
            'time_id' => 'required|exists:times,id',
            'gols' => 'required|integer|min:0',
        ]);

        // Validar se o atleta pertence ao time
        $atleta = Atleta::find($request->atleta_id);
        if ($atleta->time_id != $request->time_id) {
            return back()->with('error', 'O atleta selecionado não pertence a este time!');
        }

        // Validar se o time pertence ao campeonato
        $timeValido = TabelaClassificacao::where('campeonato_id', $request->campeonato_id)
            ->where('time_id', $request->time_id)
            ->exists();

        if (!$timeValido) {
            return back()->with('error', 'O time selecionado não pertence a este campeonato!');
        }

        Artilheiro::create($request->all());
        return redirect()->route('artilheiros.index')->with('success', 'Artilheiro adicionado com sucesso!');
    }

    public function edit(Artilheiro $artilheiro)
    {
        $campeonatos = Campeonato::all();
        $atletas = Atleta::all();
        $times = Time::all();
        
        return view('artilheiros.edit', compact('artilheiro', 'campeonatos', 'atletas', 'times'));
    }

    public function update(Request $request, Artilheiro $artilheiro)
    {
        $request->validate([
            'gols' => 'required|integer|min:0',
        ]);

        $artilheiro->update($request->only('gols'));
        return redirect()->route('artilheiros.index')->with('success', 'Artilheiro atualizado!');
    }

    public function destroy(Artilheiro $artilheiro)
    {
        $artilheiro->delete();
        return redirect()->route('artilheiros.index')->with('success', 'Artilheiro removido!');
    }
}
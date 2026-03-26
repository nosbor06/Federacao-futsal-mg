<?php

namespace App\Http\Controllers;

use App\Models\Artilheiro;
use App\Models\Campeonato;
use App\Models\Atleta;
use App\Models\Time;
use Illuminate\Http\Request;

class ArtilheiroController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $campeonatos = Campeonato::all();
        return view('artilheiros.index', compact('campeonatos'));
    }

    public function create()
    {
        $campeonatos = Campeonato::all();
        $atletas = Atleta::all();
        $times = Time::all();
        return view('artilheiros.create', compact('campeonatos', 'atletas', 'times'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
            'atleta_id' => 'required|exists:atletas,id',
            'time_id' => 'required|exists:times,id',
            'gols' => 'required|integer|min:0',
        ]);

        Artilheiro::create($request->all());

        return redirect()->route('artilheiros.index')->with('success', 'Artilheiro adicionado com sucesso!');
    }

    public function edit(Artilheiro $artilheiro)
    {
        $campeonatos = Campeonato::all();
        return view('artilheiros.edit', compact('artilheiro', 'campeonatos'));
    }

    public function update(Request $request, Artilheiro $artilheiro)
    {
        $request->validate([
            'gols' => 'required|integer|min:0',
        ]);

        $artilheiro->update(['gols' => $request->gols]);

        return redirect()->route('artilheiros.index')->with('success', 'Artilheiro atualizado com sucesso!');
    }

    public function destroy(Artilheiro $artilheiro)
    {
        $artilheiro->delete();
        return redirect()->route('artilheiros.index')->with('success', 'Artilheiro removido com sucesso!');
    }

    public function porCampeonato($campeonatoId)
    {
        $campeonato = Campeonato::findOrFail($campeonatoId);
        $artilheiros = Artilheiro::where('campeonato_id', $campeonatoId)
            ->orderBy('gols', 'desc')
            ->with(['atleta', 'time'])
            ->get();

        return view('artilheiros.por-campeonato', compact('campeonato', 'artilheiros'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;

class CampeonatoController extends Controller
{

    public function index()
    {
        $campeonatos = Campeonato::all();
        return view('campeonatos.index', compact('campeonatos'));
    }

    public function create()
    {
        return view('campeonatos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'categoria' => ['required', 'string', 'max:50'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:inscricoes_abertas,em_andamento,encerrado,cancelado'],
        ]);

        Campeonato::create($validated);

        return redirect()->route('campeonatos.index')
            ->with('success','O campeonato foi cadastrado com sucesso!');
    }

    public function edit(Campeonato $campeonato)
    {
        return view('campeonatos.edit', compact('campeonato'));
    }

    public function update(Request $request, Campeonato $campeonato)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'categoria' => ['required', 'string', 'max:50'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:inscricoes_abertas,em_andamento,encerrado,cancelado'],
        ]);

        $campeonato->update($validated);

        return redirect()->route('campeonatos.index')
            ->with('success','O campeonato foi atualizado com sucesso!');
    }

    public function destroy(Campeonato $campeonato)
    {
        $campeonato->delete();

        return redirect()->route('campeonatos.index')
            ->with('success','O campeonato foi excluído com sucesso!');
    }
}
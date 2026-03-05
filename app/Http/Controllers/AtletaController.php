<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Time;
use Illuminate\Http\Request;

class AtletaController extends Controller
{
    public function index()
    {
        $atletas = Atleta::with('time')->orderBy('id')->get();
        return view('atletas.index', compact('atletas'));
    }

    public function create()
    {
        $times = Time::all();
        return view('atletas.create', compact('times'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:20|unique:atletas,cpf',
            'data_nascimento' => 'required|date',
            'categoria' => 'required|string|max:200',
            'time_id' => 'required|exists:times,id'
        ]);

        Atleta::create($request->only([
            'nome',
            'cpf',
            'data_nascimento',
            'categoria',
            'time_id'
        ]));

        return redirect()
            ->route('atletas.index')
            ->with('success', 'Atleta cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $atleta = Atleta::findOrFail($id);
        $times = Time::all();

        return view('atletas.edit', compact('atleta', 'times'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:20|unique:atletas,cpf,' . $id,
            'data_nascimento' => 'required|date',
            'categoria' => 'required|string|max:200',
            'time_id' => 'required|exists:times,id'
        ]);

        $atleta = Atleta::findOrFail($id);

        $atleta->update($request->only([
            'nome',
            'cpf',
            'data_nascimento',
            'categoria',
            'time_id'
        ]));

        return redirect()
            ->route('atletas.index')
            ->with('success', 'Atleta atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $atleta = Atleta::findOrFail($id);
        $atleta->delete();

        return redirect()
            ->route('atletas.index')
            ->with('success', 'Atleta removido com sucesso!');
    }
}
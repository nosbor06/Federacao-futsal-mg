<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{

    public function index()
    {
        $times = Time::orderBy('id')->get();
        return view('times.index', compact('times'));
    }

    public function create()
    {
        return view('times.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'    => 'required|string|max:200',
            'cnpj'    => 'required|string|max:20|unique:times,cnpj',
            'cidade'  => 'required|string|max:200',
            'ginasio' => 'required|string|max:200',
        ]);

        Time::create($request->only([
            'nome',
            'cnpj',
            'cidade',
            'ginasio'
        ]));

        return redirect()
            ->route('times.index')
            ->with('success','Time cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $time = Time::findOrFail($id);

        return view('times.edit', compact('time'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'    => 'required|string|max:200',
            'cnpj'    => 'required|string|max:20|unique:times,cnpj,' . $id,
            'cidade'  => 'required|string|max:200',
            'ginasio' => 'required|string|max:200',
        ]);

        $time = Time::findOrFail($id);

        $time->update($request->only([
            'nome',
            'cnpj',
            'cidade',
            'ginasio'
        ]));

        return redirect()
            ->route('times.index')
            ->with('success', 'Time atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $time = Time::findOrFail($id);
        $time->delete();

        return redirect()
            ->route('times.index')
            ->with('success', 'Time removido com sucesso!');
    }
}
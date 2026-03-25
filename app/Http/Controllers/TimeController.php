<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        if(auth()->user()->tipo == 'admin'){
            $times = Time::orderBy('id')->get();
        } else {
            $times = Time::where('user_id', auth()->id())->orderBy('id')->get();
        }
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
            'escudo'  => 'nullable|image|max:2048',
        ]);

        $escudo = null;
        if($request->hasFile('escudo')){
            $escudo = $request->file('escudo')->store('escudos', 'public');
        }

        Time::create([
            'nome'    => $request->nome,
            'cnpj'    => $request->cnpj,
            'cidade'  => $request->cidade,
            'ginasio' => $request->ginasio,
            'escudo'  => $escudo,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('times.index')->with('success','Time cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $time = Time::where('id', $id)
            ->when(auth()->user()->tipo != 'admin', fn($q) => $q->where('user_id', auth()->id()))
            ->firstOrFail();

        // Buscar todos os usuários para o select
        $usuarios = User::orderBy('nome')->get();

        return view('times.edit', compact('time', 'usuarios'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'    => 'required|string|max:200',
            'cnpj'    => 'required|string|max:20|unique:times,cnpj,' . $id,
            'cidade'  => 'required|string|max:200',
            'ginasio' => 'required|string|max:200',
            'escudo'  => 'nullable|image|max:2048',
            'responsavel_id' => 'nullable|exists:users,id',  // Valida o responsável
        ]);

        $time = Time::where('id', $id)
            ->when(auth()->user()->tipo != 'admin', fn($q) => $q->where('user_id', auth()->id()))
            ->firstOrFail();

        $dados = [
            'nome'    => $request->nome,
            'cnpj'    => $request->cnpj,
            'cidade'  => $request->cidade,
            'ginasio' => $request->ginasio,
            'responsavel_id' => $request->responsavel_id,  // Adicione isso
        ];

        if($request->hasFile('escudo')){
            $dados['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        $time->update($dados);

        return redirect()->route('times.index')->with('success','Time atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $time = Time::where('id', $id)
            ->when(auth()->user()->tipo != 'admin', fn($q) => $q->where('user_id', auth()->id()))
            ->firstOrFail();

        $time->delete();
        return redirect()->route('times.index')->with('success','Time excluído com sucesso!');
    }
}
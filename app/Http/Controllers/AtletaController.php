<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Time;
use Illuminate\Http\Request;

class AtletaController extends Controller
{
    public function index()
    {
        if(auth()->user()->tipo == 'admin'){
            $atletas = Atleta::with('time')->orderBy('id')->get();
        } else {

            $atletas = Atleta::whereHas('time', function($query){
                $query->where('user_id', auth()->id());
            })->with('time')->orderBy('id')->get();

        }

        return view('atletas.index', compact('atletas'));
    }

    public function create()
    {
        if(auth()->user()->tipo == 'admin'){
            $times = Time::all();
        } else {
            $times = Time::where('user_id', auth()->id())->get();
        }

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

        Atleta::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'categoria' => $request->categoria,
            'time_id' => $request->time_id
        ]);

        return redirect()
            ->route('atletas.index')
            ->with('success', 'Atleta cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        if(auth()->user()->tipo == 'admin'){
            $atleta = Atleta::findOrFail($id);
            $times = Time::all();
        } else {

            $atleta = Atleta::whereHas('time', function($query){
                $query->where('user_id', auth()->id());
            })->findOrFail($id);

            $times = Time::where('user_id', auth()->id())->get();
        }

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

        if(auth()->user()->tipo == 'admin'){
            $atleta = Atleta::findOrFail($id);
        } else {

            $atleta = Atleta::whereHas('time', function($query){
                $query->where('user_id', auth()->id());
            })->findOrFail($id);
        }

        $atleta->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'categoria' => $request->categoria,
            'time_id' => $request->time_id
        ]);

        return redirect()
            ->route('atletas.index')
            ->with('success', 'Atleta atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        if(auth()->user()->tipo == 'admin'){
            $atleta = Atleta::findOrFail($id);
        } else {

            $atleta = Atleta::whereHas('time', function($query){
                $query->where('user_id', auth()->id());
            })->findOrFail($id);
        }

        $atleta->delete();

        return redirect()
            ->route('atletas.index')
            ->with('success', 'Atleta removido com sucesso!');
    }
}
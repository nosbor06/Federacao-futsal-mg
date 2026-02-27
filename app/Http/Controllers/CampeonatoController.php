<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonatos;

class CampeonatoController extends Controller
{
    # =-=-=-=-=-=-=-=-=-=-=-=-=-=-| Index |=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    public function index()
    {
        $campeonatos = Campeonatos::all();
        return view("campeonatos.index", compact("campeonatos"));
    }

    # =-=-=-=-=-=-=-=-=-=-=-=-=-=-| Create |=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    public function create()
    {
        return view('campeonatos.create');
    }

    # =-=-=-=-=-=-=-=-=-=-=-=-=-=-| Store |=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    public function store(Request $request)
    {
        $validated = $request->validate([
        'nome' => ['required', 'string', 'max:100'],
        'categoria' => ['required', 'string', 'max:50'],
        'data_inicio' => ['required', 'date'],
        'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
        'status' => ['required', 'in:inscricoes_abertas,em_andamento,encerrado,cancelado'],
    ]);

    return redirect()->route('campeonatos.index')->with('success', 'O campeonato foi cadastrado com sucesso!');
    }

    # =-=-=-=-=-=-=-=-=-=-=-=-=-=-| Edit |=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    public function edit(string $id)
    {
        
    }

    # =-=-=-=-=-=-=-=-=-=-=-=-=-=-| Update |=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    public function update(Request $request, string $id)
    {
        
    }

    # =-=-=-=-=-=-=-=-=-=-=-=-=-=-| Destroy |=-=-=-=-=-=-=-=-=-=-=-=-=-=-

    public function destroy(string $id)
    {
        
    }
}

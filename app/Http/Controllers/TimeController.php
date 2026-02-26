<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::orderBy('id')->get();
        return view('times.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('times.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
           $times = Time::findOrFail($id);
            return view('times.edit', compact('times'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $time = Time::findOrFail($id);
        $time->delete();

        return redirect()
            ->route('times.index')
            ->with('success', 'Time removido com sucesso!');
    }
}

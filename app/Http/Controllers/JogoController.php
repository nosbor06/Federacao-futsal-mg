<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Time;
use App\Models\Campeonato;
use App\Models\TabelaClassificacao;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        $jogos = Jogo::with('timeCasa', 'timeVisitante', 'campeonato')->orderBy('data_hora', 'desc')->get();
        return view('jogos.index', compact('jogos'));
    }

    public function create()
    {
        $campeonatos = Campeonato::where('status', 'em_andamento')->get();
        
        // Preparar times agrupados por campeonato
        $timesPorCampeonato = [];
        foreach ($campeonatos as $campeonato) {
            $timesPorCampeonato[$campeonato->id] = TabelaClassificacao::where('campeonato_id', $campeonato->id)
                ->with('time')
                ->get()
                ->map(fn($tc) => ['id' => $tc->time->id, 'nome' => $tc->time->nome])
                ->unique('id')
                ->values();
        }
        
        return view('jogos.create', compact('campeonatos', 'timesPorCampeonato'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campeonato_id' => 'required|exists:campeonatos,id',
            'time_casa_id' => 'required|exists:times,id',
            'time_visitante_id' => 'required|exists:times,id|different:time_casa_id',
            'data_hora' => 'required|date',
        ]);

        // Validar se os times pertencem ao campeonato
        $campeonatoId = $request->campeonato_id;
        $timeCasaValido = TabelaClassificacao::where('campeonato_id', $campeonatoId)
            ->where('time_id', $request->time_casa_id)->exists();
        $timeVisitanteValido = TabelaClassificacao::where('campeonato_id', $campeonatoId)
            ->where('time_id', $request->time_visitante_id)->exists();

        if (!$timeCasaValido || !$timeVisitanteValido) {
            return back()->with('error', 'Um ou ambos os times não pertencem a este campeonato!');
        }

        Jogo::create($request->all());
        return redirect()->route('jogos.index')->with('success', 'Jogo criado com sucesso!');
    }

    public function edit(Jogo $jogo)
    {
        return view('jogos.edit', compact('jogo'));
    }

    public function update(Request $request, Jogo $jogo)
    {
        $request->validate([
            'gols_casa' => 'required|integer|min:0',
            'gols_visitante' => 'required|integer|min:0',
        ]);

        $jogo->update([
            'gols_casa' => $request->gols_casa,
            'gols_visitante' => $request->gols_visitante,
            'status' => 'finalizado',
        ]);

        // Atualizar tabela de classificação
        $this->atualizarClassificacao($jogo);

        return redirect()->route('jogos.index')->with('success', 'Resultado salvo!');
    }

    private function atualizarClassificacao(Jogo $jogo)
    {
        $timeCasa = TabelaClassificacao::where('campeonato_id', $jogo->campeonato_id)
            ->where('time_id', $jogo->time_casa_id)->first();

        $timeVisitante = TabelaClassificacao::where('campeonato_id', $jogo->campeonato_id)
            ->where('time_id', $jogo->time_visitante_id)->first();

        if ($timeCasa && $timeVisitante) {
            $timeCasa->jogos += 1;
            $timeCasa->gols_pro += $jogo->gols_casa;
            $timeCasa->gols_contra += $jogo->gols_visitante;
            $timeCasa->saldo_gols = $timeCasa->gols_pro - $timeCasa->gols_contra;

            $timeVisitante->jogos += 1;
            $timeVisitante->gols_pro += $jogo->gols_visitante;
            $timeVisitante->gols_contra += $jogo->gols_casa;
            $timeVisitante->saldo_gols = $timeVisitante->gols_pro - $timeVisitante->gols_contra;

            if ($jogo->gols_casa > $jogo->gols_visitante) {
                $timeCasa->vitorias += 1;
                $timeCasa->pontos += 3;
                $timeVisitante->derrotas += 1;
            } elseif ($jogo->gols_casa < $jogo->gols_visitante) {
                $timeVisitante->vitorias += 1;
                $timeVisitante->pontos += 3;
                $timeCasa->derrotas += 1;
            } else {
                $timeCasa->empates += 1;
                $timeCasa->pontos += 1;
                $timeVisitante->empates += 1;
                $timeVisitante->pontos += 1;
            }

            $timeCasa->save();
            $timeVisitante->save();
        }
    }
}
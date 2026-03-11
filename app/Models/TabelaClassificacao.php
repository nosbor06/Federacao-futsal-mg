<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelaClassificacao extends Model
{
    use HasFactory;

    protected $table = 'tabela_classificacoes';

    protected $fillable = ['campeonato_id', 'time_id', 'jogos', 'vitorias', 'empates', 'derrotas', 'gols_pro', 'gols_contra', 'saldo_gols', 'pontos'];

    public function Campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function Time()
    {
        return $this->belongsTo(Time::class);
    }
}


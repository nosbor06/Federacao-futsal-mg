<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelaClassificacao extends Model
{
    use HasFactory;

    protected $table = 'TabelaClassificacoes';

    protected $fillable = [
        'campeonato_id',
        'time_id',
        'jogos',
        'vitorias',
        'empates',
        'derrotas',
        'gols_pro',
        'gols_contra',
        'saldo_gols',
        'pontos'
    ];

public function timeRelacao()
{
    return $this->belongsTo(Time::class, 'time_id')->withDefault();
}

public function time()
{
    return $this->belongsTo(Time::class, 'time_id')->withDefault();
}

public function campeonato()
{
    return $this->belongsTo(Campeonato::class, 'campeonato_id')->withDefault();
}

}


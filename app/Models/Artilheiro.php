<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artilheiro extends Model
{
    use HasFactory;

    protected $fillable = ['campeonato_id', 'atleta_id', 'time_id', 'gols'];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function atleta()
    {
        return $this->belongsTo(Atleta::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
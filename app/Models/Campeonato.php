<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    protected $fillable = ['nome', 'categoria', 'data_inicio', 'data_fim', 'status'];

    public function artilheiros()
    {
        return $this->hasMany(Artilheiro::class);
    }

}


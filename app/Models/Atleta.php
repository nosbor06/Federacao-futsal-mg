<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    use HasFactory;

    protected $table = 'atletas';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'categoria',
        'time_id'
    ];

    // Relacionamento com Time
    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id');
    }
}
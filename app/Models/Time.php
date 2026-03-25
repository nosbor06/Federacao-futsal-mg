<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = 'times';

    protected $fillable = [
        'nome', 
        'cnpj', 
        'cidade', 
        'ginasio', 
        'escudo', 
        'user_id',
        'responsavel_id'  // Adicione isso
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Adicione este relacionamento
    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }

    public function atletas()
    {
        return $this->hasMany(Atleta::class);
    }
}
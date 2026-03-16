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
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function atletas()
    {
        return $this->hasMany(Atleta::class);
    }
}
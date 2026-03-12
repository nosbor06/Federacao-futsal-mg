<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Atleta;

class Time extends Model
{
    use HasFactory;

    protected $table = 'times';

    protected $fillable = [
        'nome',
        'cnpj',
        'cidade',
        'ginasio',
        'user_id'
    ];

    // responsável pelo time
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // atletas do time
    public function atletas()
    {
        return $this->hasMany(Atleta::class);
    }
}
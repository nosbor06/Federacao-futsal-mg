<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;
use App\Models\User;

class TimeSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('tipo', 'admin')->first();

        $times = [
            ['nome' => 'Minas Futsal',        'cnpj' => '12.345.678/0001-01', 'cidade' => 'Belo Horizonte', 'ginasio' => 'Ginásio Riachuelo',                   'email' => 'minas@fmf.com',       'escudo' => 'images/escudo_minas.png'],
            ['nome' => 'Cruzeiro Futsal',      'cnpj' => '12.345.678/0001-02', 'cidade' => 'Belo Horizonte', 'ginasio' => 'Ginásio Taquaril',                    'email' => 'cruzeiro@fmf.com',    'escudo' => 'images/escudo_cruzeiro.png'],
            ['nome' => 'Olympico Futsal',      'cnpj' => '12.345.678/0001-03', 'cidade' => 'Contagem',       'ginasio' => 'Ginásio Olympico',                    'email' => 'olympico@fmf.com',    'escudo' => 'images/escudo_olympico.png'],
            ['nome' => 'América Futsal',       'cnpj' => '12.345.678/0001-04', 'cidade' => 'Belo Horizonte', 'ginasio' => 'Ginásio Carlos Prates',               'email' => 'america@fmf.com',     'escudo' => 'images/escudo_america.png'],
            ['nome' => 'Pará de Minas Futsal', 'cnpj' => '12.345.678/0001-05', 'cidade' => 'Pará de Minas',  'ginasio' => 'Ginásio Poliesportivo de Pará de Minas','email' => 'parademinas@fmf.com', 'escudo' => null],
            ['nome' => 'Athletic Futsal',      'cnpj' => '12.345.678/0001-06', 'cidade' => 'São João Del Rei','ginasio' => 'Ginásio Poliesportivo SJDR',          'email' => 'athletic@fmf.com',    'escudo' => 'images/escudo_athletic.png'],
        ];

        foreach ($times as $t) {
            $user = User::where('email', $t['email'])->first() ?? $admin;
            Time::create([
                'nome'    => $t['nome'],
                'cnpj'    => $t['cnpj'],
                'cidade'  => $t['cidade'],
                'ginasio' => $t['ginasio'],
                'escudo'  => $t['escudo'],
                'user_id' => $user->id,
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;
use App\Models\User;

class TimeSeeder extends Seeder
{
    public function run(): void
    {
        $times = [
            [
                'nome'    => 'Minas Futsal',
                'cnpj'    => '12.345.678/0001-01',
                'cidade'  => 'Belo Horizonte',
                'ginasio' => 'Ginásio Riachuelo',
                'email'   => 'minas@fmf.com',
            ],
            [
                'nome'    => 'Cruzeiro Futsal',
                'cnpj'    => '12.345.678/0001-02',
                'cidade'  => 'Belo Horizonte',
                'ginasio' => 'Ginásio Taquaril',
                'email'   => 'cruzeiro@fmf.com',
            ],
            [
                'nome'    => 'Olympico Futsal',
                'cnpj'    => '12.345.678/0001-03',
                'cidade'  => 'Contagem',
                'ginasio' => 'Ginásio Olympico',
                'email'   => 'olympico@fmf.com',
            ],
            [
                'nome'    => 'América Futsal',
                'cnpj'    => '12.345.678/0001-04',
                'cidade'  => 'Belo Horizonte',
                'ginasio' => 'Ginásio Carlos Prates',
                'email'   => 'america@fmf.com',
            ],
            [
                'nome'    => 'Pará de Minas Futsal',
                'cnpj'    => '12.345.678/0001-05',
                'cidade'  => 'Pará de Minas',
                'ginasio' => 'Ginásio Poliesportivo de Pará de Minas',
                'email'   => 'parademinas@fmf.com',
            ],
            [
                'nome'    => 'Athletic Futsal',
                'cnpj'    => '12.345.678/0001-06',
                'cidade'  => 'São João Del Rei',
                'ginasio' => 'Ginásio Poliesportivo SJDR',
                'email'   => 'athletic@fmf.com',
            ],
        ];

        // Busca o admin como fallback caso não encontre o responsável
        $admin = User::where('tipo', 'admin')->first();

        foreach ($times as $t) {
            $user = User::where('email', $t['email'])->first() ?? $admin;
            Time::create([
                'nome'    => $t['nome'],
                'cnpj'    => $t['cnpj'],
                'cidade'  => $t['cidade'],
                'ginasio' => $t['ginasio'],
                'user_id' => $user->id,
            ]);
        }
    }
}
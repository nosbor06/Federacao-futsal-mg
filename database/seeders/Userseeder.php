<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nome'     => 'Federação Mineira de Futsal',
            'email'    => 'admin@fmf.com',
            'password' => Hash::make('admin123'),
            'tipo'     => 'admin',
        ]);

        $responsaveis = [
            ['nome' => 'Responsável Minas Futsal',       'email' => 'minas@fmf.com'],
            ['nome' => 'Responsável Cruzeiro Futsal',    'email' => 'cruzeiro@fmf.com'],
            ['nome' => 'Responsável Olympico Futsal',    'email' => 'olympico@fmf.com'],
            ['nome' => 'Responsável América Futsal',     'email' => 'america@fmf.com'],
            ['nome' => 'Responsável Pará de Minas',      'email' => 'parademinas@fmf.com'],
            ['nome' => 'Responsável Athletic Futsal',    'email' => 'athletic@fmf.com'],
        ];

        foreach ($responsaveis as $r) {
            User::create([
                'nome'     => $r['nome'],
                'email'    => $r['email'],
                'password' => Hash::make('senha123'),
                'tipo'     => 'responsavel',
            ]);
        }
    }
}
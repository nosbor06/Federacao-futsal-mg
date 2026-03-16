<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atleta;
use App\Models\Time;

class AtletaSeeder extends Seeder
{
    public function run(): void
    {
        $atletas = [
            // Minas Futsal
            ['nome' => 'Lucas Oliveira',    'cpf' => '111.111.111-01', 'nascimento' => '2000-03-15', 'categoria' => 'Adulto',  'time' => 'Minas Futsal'],
            ['nome' => 'Gabriel Souza',     'cpf' => '111.111.111-02', 'nascimento' => '2001-07-22', 'categoria' => 'Adulto',  'time' => 'Minas Futsal'],
            ['nome' => 'Pedro Alves',       'cpf' => '111.111.111-03', 'nascimento' => '2008-01-10', 'categoria' => 'Sub-17',  'time' => 'Minas Futsal'],

            // Cruzeiro Futsal
            ['nome' => 'Matheus Costa',     'cpf' => '222.222.222-01', 'nascimento' => '1999-05-18', 'categoria' => 'Adulto',  'time' => 'Cruzeiro Futsal'],
            ['nome' => 'Felipe Martins',    'cpf' => '222.222.222-02', 'nascimento' => '2002-11-30', 'categoria' => 'Adulto',  'time' => 'Cruzeiro Futsal'],
            ['nome' => 'Bruno Lima',        'cpf' => '222.222.222-03', 'nascimento' => '2009-04-25', 'categoria' => 'Sub-17',  'time' => 'Cruzeiro Futsal'],

            // Olympico Futsal
            ['nome' => 'Rodrigo Ferreira',  'cpf' => '333.333.333-01', 'nascimento' => '2003-08-12', 'categoria' => 'Sub-20',  'time' => 'Olympico Futsal'],
            ['nome' => 'Samuel Drumound',      'cpf' => '333.333.333-02', 'nascimento' => '2009-02-05', 'categoria' => 'Sub-17',  'time' => 'Olympico Futsal'],
            ['nome' => 'Carlos Mendes',     'cpf' => '333.333.333-03', 'nascimento' => '1998-12-20', 'categoria' => 'Adulto',  'time' => 'Olympico Futsal'],

            // América Futsal
            ['nome' => 'Diego Rocha',       'cpf' => '444.444.444-01', 'nascimento' => '2000-06-08', 'categoria' => 'Adulto',  'time' => 'América Futsal'],
            ['nome' => 'Thiago Nunes',      'cpf' => '444.444.444-02', 'nascimento' => '2008-09-17', 'categoria' => 'Sub-17',  'time' => 'América Futsal'],

            // Pará de Minas
            ['nome' => 'Rafael Carvalho',   'cpf' => '555.555.555-01', 'nascimento' => '2001-04-03', 'categoria' => 'Adulto',  'time' => 'Pará de Minas Futsal'],
            ['nome' => 'Leonardo Pinto',    'cpf' => '555.555.555-02', 'nascimento' => '2009-07-14', 'categoria' => 'Sub-17',  'time' => 'Pará de Minas Futsal'],

            // Athletic
            ['nome' => 'Gustavo Reis',      'cpf' => '666.666.666-01', 'nascimento' => '1997-10-25', 'categoria' => 'Adulto',  'time' => 'Athletic Futsal'],
            ['nome' => 'Vinícius Moura',    'cpf' => '666.666.666-02', 'nascimento' => '2008-03-30', 'categoria' => 'Sub-17',  'time' => 'Athletic Futsal'],
        ];

        foreach ($atletas as $a) {
            $time = Time::where('nome', $a['time'])->first();
            Atleta::create([
                'nome'            => $a['nome'],
                'cpf'             => $a['cpf'],
                'data_nascimento' => $a['nascimento'],
                'categoria'       => $a['categoria'],
                'time_id'         => $time->id,
            ]);
        }
    }
}
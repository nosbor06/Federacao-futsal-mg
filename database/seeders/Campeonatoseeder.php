<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campeonato;

class CampeonatoSeeder extends Seeder
{
    public function run(): void
    {
        $campeonatos = [
            [
                'nome'        => 'Copa Mineira de Futsal 2026',
                'categoria'   => 'Adulto',
                'data_inicio' => '2026-03-01',
                'data_fim'    => '2026-07-30',
                'status'      => 'em_andamento',
            ],
            [
                'nome'        => 'Campeonato Mineiro Sub-17 2026',
                'categoria'   => 'Sub-17',
                'data_inicio' => '2026-04-01',
                'data_fim'    => '2026-08-30',
                'status'      => 'inscricoes_abertas',
            ],
            [
                'nome'        => 'Campeonato Mineiro Sub-20 2026',
                'categoria'   => 'Sub-20',
                'data_inicio' => '2026-05-01',
                'data_fim'    => '2026-09-30',
                'status'      => 'inscricoes_abertas',
            ],
            [
                'nome'        => 'Copa Futsal MG 2025',
                'categoria'   => 'Adulto',
                'data_inicio' => '2025-03-01',
                'data_fim'    => '2025-11-30',
                'status'      => 'encerrado',
            ],
        ];

        foreach ($campeonatos as $c) {
            Campeonato::create($c);
        }
    }
}
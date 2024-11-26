<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attendances = [
            [
                'client_id' => 1,
                'type_id' => 1,
                'description' => 'Consulta inicial sobre serviços.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 3,
                'description' => 'Reunião para alinhamento estratégico.',
                'status' => 'Em Progresso',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 2,
                'description' => 'Análise de contrato e revisão de cláusulas.',
                'status' => 'Concluído',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 1,
                'description' => 'Planejamento de ações para novo projeto.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 2,
                'description' => 'Solicitação de manutenção técnica.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 1,
                'type_id' => 3,
                'description' => 'Discussão sobre feedbacks recebidos.',
                'status' => 'Concluído',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 2,
                'description' => 'Reunião para renovação de contrato.',
                'status' => 'Em Progresso',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 1,
                'description' => 'Acompanhamento do desempenho do projeto.',
                'status' => 'Concluído',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 3,
                'description' => 'Treinamento da equipe sobre novo sistema.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 2,
                'description' => 'Avaliação de desempenho técnico.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 1,
                'type_id' => 1,
                'description' => 'Sessão de brainstorming para melhorias.',
                'status' => 'Em Progresso',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 3,
                'description' => 'Planejamento de orçamento para o próximo trimestre.',
                'status' => 'Concluído',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 2,
                'description' => 'Suporte técnico para integração de sistemas.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 1,
                'description' => 'Revisão de resultados mensais.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 3,
                'description' => 'Sessão de revisão de estratégia de mercado.',
                'status' => 'Concluído',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 1,
                'type_id' => 2,
                'description' => 'Suporte para instalação de ferramentas adicionais.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 1,
                'description' => 'Orientação para novos procedimentos.',
                'status' => 'Em Progresso',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 3,
                'description' => 'Avaliação da estrutura organizacional.',
                'status' => 'Concluído',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 2,
                'description' => 'Manutenção preventiva de sistemas.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(1, 30))
            ],
        ];

        DB::table('attendances')->insert($attendances);
    }
}

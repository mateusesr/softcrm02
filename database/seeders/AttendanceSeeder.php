<?php

namespace Database\Seeders;

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
                'description' => 'Consulta inicial sobre possibilidades de parceria.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 2,
                'description' => 'Discussão sobre revisão contratual.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 3,
                'description' => 'Acompanhamento do progresso do projeto mensal.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 1,
                'description' => 'Análise inicial de requisitos técnicos.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 2,
                'description' => 'Solicitação de manutenção preventiva.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1,
                'type_id' => 3,
                'description' => 'Feedback sobre novas propostas comerciais.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 1,
                'description' => 'Planejamento de ações para próxima fase.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 2,
                'description' => 'Consulta sobre alterações em cláusulas contratuais.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 3,
                'description' => 'Treinamento de equipe para nova plataforma.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 1,
                'description' => 'Sessão de brainstorming para melhorias.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1,
                'type_id' => 2,
                'description' => 'Preparação de orçamento anual.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 3,
                'description' => 'Discussão sobre integração de sistemas.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 1,
                'description' => 'Acompanhamento semanal de resultados.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 2,
                'description' => 'Revisão e aprovação de documentos técnicos.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 3,
                'description' => 'Solicitação de suporte técnico emergencial.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1,
                'type_id' => 2,
                'description' => 'Avaliação de alternativas para novos projetos.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 2,
                'type_id' => 1,
                'description' => 'Orientação sobre processos internos.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 3,
                'type_id' => 2,
                'description' => 'Consulta sobre desempenho do produto.',
                'status' => 'Urgente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 4,
                'type_id' => 3,
                'description' => 'Planejamento de transição para novo sistema.',
                'status' => 'Finalizado',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5,
                'type_id' => 1,
                'description' => 'Feedback sobre implementação recente.',
                'status' => 'Pendente',
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
        ];

        DB::table('attendances')->insert($attendances);
    }
}

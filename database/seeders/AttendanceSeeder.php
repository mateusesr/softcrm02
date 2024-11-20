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
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1, 
                'type_id' => 1, 
                'description' => 'Consulta inicial sobre serviços.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1, 
                'type_id' => 1, 
                'description' => 'Consulta inicial sobre serviços.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1, 
                'type_id' => 1, 
                'description' => 'Consulta inicial sobre serviços.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1, 
                'type_id' => 1, 
                'description' => 'Consulta inicial sobre serviços.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 2, 
                'type_id' => 2, 
                'description' => 'Revisão de contrato e propostas.', 
                'status' => 'Urgente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 3, 
                'type_id' => 1, 
                'description' => 'Acompanhamento mensal.', 
                'status' => 'Finalizado', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 4, 
                'type_id' => 3, 
                'description' => 'Discussão sobre atualizações de serviço.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 2, 
                'description' => 'Solicitação de suporte técnico.', 
                'status' => 'Urgente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 1, 
                'type_id' => 3, 
                'description' => 'Orientação para novos processos.', 
                'status' => 'Finalizado', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 2, 
                'type_id' => 1, 
                'description' => 'Suporte em novos projetos.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 3, 
                'type_id' => 2, 
                'description' => 'Consulta para renovação de contrato.', 
                'status' => 'Finalizado', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 4, 
                'type_id' => 1, 
                'description' => 'Treinamento de equipe.', 
                'status' => 'Urgente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 3, 
                'description' => 'Avaliação de resultados.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 3, 
                'description' => 'Avaliação de resultados.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 3, 
                'description' => 'Avaliação de resultados.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 3, 
                'description' => 'Avaliação de resultados.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 3, 
                'description' => 'Avaliação de resultados.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
            [
                'client_id' => 5, 
                'type_id' => 3, 
                'description' => 'Avaliação de resultados.', 
                'status' => 'Pendente', 
                'date' => Carbon::now()->subDays(rand(0, 30))
            ],
        ];

        DB::table('attendances')->insert($attendances);
    }
}

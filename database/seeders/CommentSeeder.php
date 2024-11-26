<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
            ['attendance_id' => 1, 'description' => 'Cliente relatou expectativas iniciais sobre o serviço.', 'created_at' => '2024-11-01 11:00:00'],
            ['attendance_id' => 1, 'description' => 'Detalhamento das demandas apresentadas.', 'created_at' => '2024-11-01 12:00:00'],
            ['attendance_id' => 2, 'description' => 'Discussão sobre o contrato e ajustes necessários.', 'created_at' => '2024-11-02 14:15:00'],
            ['attendance_id' => 2, 'description' => 'Adicionado um ponto extra na cláusula do contrato.', 'created_at' => '2024-11-02 16:00:00'],
            ['attendance_id' => 3, 'description' => 'Atualização mensal realizada com sucesso.', 'created_at' => '2024-11-03 09:00:00'],
            ['attendance_id' => 3, 'description' => 'Cliente aprovou a atualização mensal.', 'created_at' => '2024-11-03 10:00:00'],
            ['attendance_id' => 4, 'description' => 'Observações sobre o progresso do serviço.', 'created_at' => '2024-11-04 16:45:00'],
            ['attendance_id' => 4, 'description' => 'Identificadas melhorias a serem implementadas.', 'created_at' => '2024-11-04 17:30:00'],
            ['attendance_id' => 5, 'description' => 'Suporte técnico adicional foi solicitado.', 'created_at' => '2024-11-05 11:20:00'],
            ['attendance_id' => 5, 'description' => 'Finalização de suporte técnico agendada.', 'created_at' => '2024-11-05 13:00:00'],
            ['attendance_id' => 6, 'description' => 'Nova solicitação do cliente registrada.', 'created_at' => '2024-11-06 09:00:00'],
            ['attendance_id' => 6, 'description' => 'Planejamento de execução ajustado.', 'created_at' => '2024-11-06 15:30:00'],
            ['attendance_id' => 7, 'description' => 'Atualização de status enviada para o cliente.', 'created_at' => '2024-11-07 10:00:00'],
            ['attendance_id' => 7, 'description' => 'Cliente aprovou as mudanças realizadas.', 'created_at' => '2024-11-07 14:30:00'],
            ['attendance_id' => 8, 'description' => 'Treinamento inicial conduzido com sucesso.', 'created_at' => '2024-11-08 09:00:00'],
            ['attendance_id' => 8, 'description' => 'Próximo módulo de treinamento agendado.', 'created_at' => '2024-11-08 16:00:00'],
            ['attendance_id' => 9, 'description' => 'Novo feedback do cliente sobre a entrega.', 'created_at' => '2024-11-09 11:30:00'],
            ['attendance_id' => 9, 'description' => 'Sugestões de melhorias analisadas.', 'created_at' => '2024-11-09 14:00:00'],
            ['attendance_id' => 10, 'description' => 'Conclusão do projeto final registrada.', 'created_at' => '2024-11-10 18:00:00'],
        ];

        DB::table('comments')->insert($comments);
    }
}

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
        $comments =
            [
                ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
                ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
                ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
                ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
                ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
                ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.', 'created_at' => '2024-11-01 10:30:00'],
                ['attendance_id' => 2, 'description' => 'Discussão sobre o contrato e ajustes necessários.', 'created_at' => '2024-11-02 14:15:00'],
                ['attendance_id' => 3, 'description' => 'Atualização mensal realizada com sucesso.', 'created_at' => '2024-11-03 09:00:00'],
                ['attendance_id' => 4, 'description' => 'Observações sobre o progresso do serviço.', 'created_at' => '2024-11-04 16:45:00'],
                ['attendance_id' => 5, 'description' => 'Suporte técnico adicional foi solicitado.', 'created_at' => '2024-11-05 11:20:00'],
                ['attendance_id' => 1, 'description' => 'Feedback inicial do cliente.', 'created_at' => '2024-11-06 13:10:00'],
                ['attendance_id' => 2, 'description' => 'Novo ponto abordado para revisão do contrato.', 'created_at' => '2024-11-07 15:25:00'],
                ['attendance_id' => 3, 'description' => 'Conclusão e assinatura finalizada.', 'created_at' => '2024-11-08 17:30:00'],
                ['attendance_id' => 4, 'description' => 'Novo treinamento solicitado.', 'created_at' => '2024-11-09 10:05:00'],
                ['attendance_id' => 5, 'description' => 'Feedback sobre os resultados finais.', 'created_at' => '2024-11-10 14:50:00'],
            ];

        DB::table('comments')->insert($comments);
    }
}

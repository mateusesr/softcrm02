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
            ['attendance_id' => 1, 'description' => 'Comentário sobre o início do atendimento.'],
            ['attendance_id' => 2, 'description' => 'Discussão sobre o contrato e ajustes necessários.'],
            ['attendance_id' => 3, 'description' => 'Atualização mensal realizada com sucesso.'],
            ['attendance_id' => 4, 'description' => 'Observações sobre o progresso do serviço.'],
            ['attendance_id' => 5, 'description' => 'Suporte técnico adicional foi solicitado.'],
            ['attendance_id' => 1, 'description' => 'Feedback inicial do cliente.'],
            ['attendance_id' => 2, 'description' => 'Novo ponto abordado para revisão do contrato.'],
            ['attendance_id' => 3, 'description' => 'Conclusão e assinatura finalizada.'],
            ['attendance_id' => 4, 'description' => 'Novo treinamento solicitado.'],
            ['attendance_id' => 5, 'description' => 'Feedback sobre os resultados finais.'],
        ];

        DB::table('comments')->insert($comments);
    }
}

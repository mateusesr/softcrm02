<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['city_id' => 1, 'name' => 'João da Silva', 'email' => 'joao.silva@example.com', 'phone' => '11912345678', 'is_active' => 1],
            ['city_id' => 1, 'name' => 'Luana Pereira', 'email' => 'luana.pereira@example.com', 'phone' => '11987654321', 'is_active' => 1],
            ['city_id' => 1, 'name' => 'Felipe Araújo', 'email' => 'felipe.araujo@example.com', 'phone' => '11933445566', 'is_active' => 1],
            ['city_id' => 2, 'name' => 'Maria Oliveira', 'email' => 'maria.oliveira@example.com', 'phone' => '21923456789', 'is_active' => 1],
            ['city_id' => 2, 'name' => 'Gabriel Santos', 'email' => 'gabriel.santos@example.com', 'phone' => '21944556677', 'is_active' => 1],
            ['city_id' => 3, 'name' => 'Carlos Souza', 'email' => 'carlos.souza@example.com', 'phone' => '31934567890', 'is_active' => 1],
            ['city_id' => 4, 'name' => 'Ana Costa', 'email' => 'ana.costa@example.com', 'phone' => '41945678901', 'is_active' => 1],
            ['city_id' => 5, 'name' => 'Pedro Martins', 'email' => 'pedro.martins@example.com', 'phone' => '51956789012', 'is_active' => 1],
            ['city_id' => 1, 'name' => 'Fernanda Lima', 'email' => 'fernanda.lima@example.com', 'phone' => '61967890123', 'is_active' => 1],
            ['city_id' => 2, 'name' => 'Bruno Ribeiro', 'email' => 'bruno.ribeiro@example.com', 'phone' => '71978901234', 'is_active' => 1],
            ['city_id' => 3, 'name' => 'Juliana Carvalho', 'email' => 'juliana.carvalho@example.com', 'phone' => '81989012345', 'is_active' => 1],
            ['city_id' => 4, 'name' => 'Ricardo Almeida', 'email' => 'ricardo.almeida@example.com', 'phone' => '91990123456', 'is_active' => 1],
            ['city_id' => 5, 'name' => 'Paula Mendes', 'email' => 'paula.mendes@example.com', 'phone' => '10123456789', 'is_active' => 1],
            ['city_id' => 6, 'name' => 'Eduardo Nunes', 'email' => 'eduardo.nunes@example.com', 'phone' => '31912345678', 'is_active' => 1],
            ['city_id' => 7, 'name' => 'Carolina Silva', 'email' => 'carolina.silva@example.com', 'phone' => '41998765432', 'is_active' => 1],
            ['city_id' => 8, 'name' => 'Renata Rocha', 'email' => 'renata.rocha@example.com', 'phone' => '51912344321', 'is_active' => 1],
            ['city_id' => 9, 'name' => 'Marcelo Almeida', 'email' => 'marcelo.almeida@example.com', 'phone' => '61999887766', 'is_active' => 1],
            ['city_id' => 10, 'name' => 'Luciana Prado', 'email' => 'luciana.prado@example.com', 'phone' => '71966554433', 'is_active' => 1],
            ['city_id' => 11, 'name' => 'Rodrigo Teixeira', 'email' => 'rodrigo.teixeira@example.com', 'phone' => '81911223344', 'is_active' => 1],
            ['city_id' => 12, 'name' => 'Mariana Cunha', 'email' => 'mariana.cunha@example.com', 'phone' => '91977665544', 'is_active' => 1],
            ['city_id' => 13, 'name' => 'Thiago Barbosa', 'email' => 'thiago.barbosa@example.com', 'phone' => '10111222333', 'is_active' => 1],
            ['city_id' => 14, 'name' => 'Aline Ferreira', 'email' => 'aline.ferreira@example.com', 'phone' => '21988997766', 'is_active' => 1],
            ['city_id' => 15, 'name' => 'Gustavo Antunes', 'email' => 'gustavo.antunes@example.com', 'phone' => '31966557788', 'is_active' => 1],
            ['city_id' => 16, 'name' => 'Sofia Mendes', 'email' => 'sofia.mendes@example.com', 'phone' => '41933445566', 'is_active' => 1],
            ['city_id' => 17, 'name' => 'Matheus Monteiro', 'email' => 'matheus.monteiro@example.com', 'phone' => '51912344321', 'is_active' => 1],
        ];

        DB::table('clients')->insert($clients);
    }
}

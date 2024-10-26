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
            ['city_id' => 2, 'name' => 'Maria Oliveira', 'email' => 'maria.oliveira@example.com', 'phone' => '21923456789', 'is_active' => 1],
            ['city_id' => 3, 'name' => 'Carlos Souza', 'email' => 'carlos.souza@example.com', 'phone' => '31934567890', 'is_active' => 1],
            ['city_id' => 4, 'name' => 'Ana Costa', 'email' => 'ana.costa@example.com', 'phone' => '41945678901', 'is_active' => 1],
            ['city_id' => 5, 'name' => 'Pedro Martins', 'email' => 'pedro.martins@example.com', 'phone' => '51956789012', 'is_active' => 1],
            ['city_id' => 1, 'name' => 'Fernanda Lima', 'email' => 'fernanda.lima@example.com', 'phone' => '61967890123', 'is_active' => 1],
            ['city_id' => 2, 'name' => 'Bruno Ribeiro', 'email' => 'bruno.ribeiro@example.com', 'phone' => '71978901234', 'is_active' => 1],
            ['city_id' => 3, 'name' => 'Juliana Carvalho', 'email' => 'juliana.carvalho@example.com', 'phone' => '81989012345', 'is_active' => 1],
            ['city_id' => 4, 'name' => 'Ricardo Almeida', 'email' => 'ricardo.almeida@example.com', 'phone' => '91990123456', 'is_active' => 1],
            ['city_id' => 5, 'name' => 'Paula Mendes', 'email' => 'paula.mendes@example.com', 'phone' => '10123456789', 'is_active' => 1],
        ];

        DB::table('clients')->insert($clients);
    }
}

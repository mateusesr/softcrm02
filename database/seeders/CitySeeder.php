<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // Cidades de São Paulo (SP)
            ['name' => 'São Paulo', 'uf' => 'SP'],
            ['name' => 'Campinas', 'uf' => 'SP'],
            ['name' => 'Santos', 'uf' => 'SP'],
            ['name' => 'Guarulhos', 'uf' => 'SP'],
            ['name' => 'Sorocaba', 'uf' => 'SP'],
            ['name' => 'Ribeirão Preto', 'uf' => 'SP'],
            ['name' => 'São Bernardo do Campo', 'uf' => 'SP'],
            ['name' => 'Santo André', 'uf' => 'SP'],
            ['name' => 'Osasco', 'uf' => 'SP'],
            ['name' => 'São José dos Campos', 'uf' => 'SP'],
            ['name' => 'Mogi das Cruzes', 'uf' => 'SP'],
            ['name' => 'Jundiaí', 'uf' => 'SP'],
            ['name' => 'Piracicaba', 'uf' => 'SP'],
            ['name' => 'Bauru', 'uf' => 'SP'],
            ['name' => 'Franca', 'uf' => 'SP'],
            ['name' => 'Carapicuíba', 'uf' => 'SP'],
            ['name' => 'São Vicente', 'uf' => 'SP'],
            ['name' => 'Diadema', 'uf' => 'SP'],
            ['name' => 'Itaquaquecetuba', 'uf' => 'SP'],
            ['name' => 'Suzano', 'uf' => 'SP'],
            ['name' => 'Taboão da Serra', 'uf' => 'SP'],
            ['name' => 'Barueri', 'uf' => 'SP'],
            ['name' => 'Embu das Artes', 'uf' => 'SP'],
            ['name' => 'Cotia', 'uf' => 'SP'],
            ['name' => 'Araraquara', 'uf' => 'SP'],
            ['name' => 'Americana', 'uf' => 'SP'],
            ['name' => 'Bragança Paulista', 'uf' => 'SP'],
            ['name' => 'Itu', 'uf' => 'SP'],
            ['name' => 'Atibaia', 'uf' => 'SP'],
            ['name' => 'Itapevi', 'uf' => 'SP'],

            // Cidades do Rio Grande do Sul (RS)
            ['name' => 'Porto Alegre', 'uf' => 'RS'],
            ['name' => 'Caxias do Sul', 'uf' => 'RS'],
            ['name' => 'Pelotas', 'uf' => 'RS'],
            ['name' => 'Canoas', 'uf' => 'RS'],
            ['name' => 'Santa Maria', 'uf' => 'RS'],
            ['name' => 'Gravataí', 'uf' => 'RS'],
            ['name' => 'Viamão', 'uf' => 'RS'],
            ['name' => 'Novo Hamburgo', 'uf' => 'RS'],
            ['name' => 'São Leopoldo', 'uf' => 'RS'],
            ['name' => 'Rio Grande', 'uf' => 'RS'],
            ['name' => 'Alvorada', 'uf' => 'RS'],
            ['name' => 'Passo Fundo', 'uf' => 'RS'],
            ['name' => 'Uruguaiana', 'uf' => 'RS'],
            ['name' => 'Santa Cruz do Sul', 'uf' => 'RS'],
            ['name' => 'Bagé', 'uf' => 'RS'],
            ['name' => 'Bento Gonçalves', 'uf' => 'RS'],
            ['name' => 'Erechim', 'uf' => 'RS'],
            ['name' => 'Guaíba', 'uf' => 'RS'],
            ['name' => 'Cachoeirinha', 'uf' => 'RS'],
            ['name' => 'Sapucaia do Sul', 'uf' => 'RS'],
            ['name' => 'Santarém', 'uf' => 'RS'],
            ['name' => 'Esteio', 'uf' => 'RS'],
            ['name' => 'Farroupilha', 'uf' => 'RS'],
            ['name' => 'Ijuí', 'uf' => 'RS'],
            ['name' => 'Lajeado', 'uf' => 'RS'],
            ['name' => 'Venâncio Aires', 'uf' => 'RS'],
            ['name' => 'Campo Bom', 'uf' => 'RS'],
            ['name' => 'Camaquã', 'uf' => 'RS'],
            ['name' => 'Taquara', 'uf' => 'RS'],
            ['name' => 'Sapiranga', 'uf' => 'RS'],
            ['name' => 'São Borja', 'uf' => 'RS'],
            ['name' => 'Santo Ângelo', 'uf' => 'RS'],
            // Adicione mais cidades do Rio Grande do Sul conforme necessário...
        ];

        // Insere todas as cidades no banco de dados
        DB::table('cities')->insert($cities);
    }
}

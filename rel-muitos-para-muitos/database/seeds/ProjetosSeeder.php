<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            'nome' => "Sistema de Vendas",
            'estimativa_horas' => 100
        ]);

        DB::table('projetos')->insert([
            'nome' => "Sistema de ERP",
            'estimativa_horas' => 10000
        ]);

        DB::table('projetos')->insert([
            'nome' => "Sistema E-mail",
            'estimativa_horas' => 10
        ]);

        DB::table('projetos')->insert([
            'nome' => "Sistema de Clientes",
            'estimativa_horas' => 100
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert([
            'nome' => "Felipe",
            "cargo" => "Gerente de Projetos"
        ]);

        DB::table('desenvolvedores')->insert([
            'nome' => "Carlos",
            "cargo" => "Programador PHP"
        ]);

        DB::table('desenvolvedores')->insert([
            'nome' => "João",
            "cargo" => "Estagiario"
        ]);
    }
}

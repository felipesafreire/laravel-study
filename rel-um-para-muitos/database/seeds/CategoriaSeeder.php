<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nome' => "Roupas"]);
        DB::table('categorias')->insert(['nome' => "Eletrodomesticos"]);
        DB::table('categorias')->insert(['nome' => "Informática"]);
        DB::table('categorias')->insert(['nome' => "Eletronicos"]);
        DB::table('categorias')->insert(['nome' => "Perfumes"]);
        DB::table('categorias')->insert(['nome' => "Alimentos"]);
    }
}

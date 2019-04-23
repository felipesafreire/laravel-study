<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(['nome' => "Camiseta Polo", 'preco' => 100, 'estoque' => 4, 'categoria_id' => 1]);
        DB::table('produtos')->insert(['nome' => "Calça Jeans", 'preco' => 150, 'estoque' => 40, 'categoria_id' => 2]);
        DB::table('produtos')->insert(['nome' => "Geladeira", 'preco' => 70, 'estoque' => 2, 'categoria_id' => 1]);
        DB::table('produtos')->insert(['nome' => "Video Game", 'preco' => 80, 'estoque' => 1, 'categoria_id' => 4]);
        DB::table('produtos')->insert(['nome' => "PC Gamer", 'preco' => 6000, 'estoque' => 5, 'categoria_id' => 3]);
        DB::table('produtos')->insert(['nome' => "Mouse Gamer", 'preco' => 80, 'estoque' => 80, 'categoria_id' => 2]);
    }
}

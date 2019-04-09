<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $i = 0;
        while($i == 100){
            DB::table('categorias')->insert([
                'nome' => $faker->domainWord
            ]);
            $i++;
        }
    }
}

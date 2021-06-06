<?php

namespace Database\Seeders;

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
        DB::table('categorias')->insert(['nome' => 'Eletrodomésticos']);
        DB::table('categorias')->insert(['nome' => 'Eletroeletrônicos']);
        DB::table('categorias')->insert(['nome' => 'Móveis']);
        DB::table('categorias')->insert(['nome' => 'Informática']);
        DB::table('categorias')->insert(['nome' => 'Celulares']);
    }
}

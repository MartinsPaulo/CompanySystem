<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'São Paulo',
            'abbreviation' => 'SP'
        ]);
        DB::table('states')->insert([
            'name' => 'Paraná',
            'abbreviation' => 'PR'
        ]);
        DB::table('states')->insert([
            'name' => 'Rio de Janeiro',
            'abbreviation' => 'RJ'
        ]);
        DB::table('states')->insert([
            'name' => 'Minas Gerais',
            'abbreviation' => 'MG'
        ]);
        DB::table('states')->insert([
            'name' => 'Bahia',
            'abbreviation' => 'BH'
        ]);
        DB::table('states')->insert([
            'name' => 'Goiás',
            'abbreviation' => 'GO'
        ]);
        DB::table('states')->insert([
            'name' => 'Amazonas',
            'abbreviation' => 'AM'
        ]);
        DB::table('states')->insert([
            'name' => 'Amapá',
            'abbreviation' => 'AP'
        ]);
        DB::table('states')->insert([
            'name' => 'Rio Grande do Sul',
            'abbreviation' => 'RS'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'São Paulo',
            'state_id' => '1'
        ]);
        DB::table('cities')->insert([
            'name' => 'Niterói',
            'state_id' => '3'
        ]);
        DB::table('cities')->insert([
            'name' => 'Angra dos Reis',
            'state_id' => '3'
        ]);
        DB::table('cities')->insert([
            'name' => 'Curitiba',
            'state_id' => '2'
        ]);
        DB::table('cities')->insert([
            'name' => 'Maringá',
            'state_id' => '2'
        ]);
        DB::table('cities')->insert([
            'name' => 'Londrina',
            'state_id' => '2'
        ]);
        DB::table('cities')->insert([
            'name' => 'Ponta Grossa',
            'state_id' => '2'
        ]);
        DB::table('cities')->insert([
            'name' => 'Fartura',
            'state_id' => '1'
        ]);
        DB::table('cities')->insert([
            'name' => 'Piraju',
            'state_id' => '1'
        ]);
        DB::table('cities')->insert([
            'name' => 'Campinas',
            'state_id' => '1'
        ]);
        DB::table('cities')->insert([
            'name' => 'Bauru',
            'state_id' => '1'
        ]);
        DB::table('cities')->insert([
            'name' => 'Belo Horizonte',
            'state_id' => '4'
        ]);
    }
}

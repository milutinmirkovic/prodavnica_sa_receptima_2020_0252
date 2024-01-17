<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StavkaReceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stavka_recept')->insert([
            [
                'recept_id' => 1, 
                'namirnica_id' => 14, 
                'kolicina_namirnice' => 0.2
            ],
            [
                'recept_id' => 1,
                'namirnica_id' => 15, 
                'kolicina_namirnice' => 0.1
            ],
            [
                'recept_id' => 1, 
                'namirnica_id' => 5, 
                'kolicina_namirnice' => 0.3
            ],
            [
                'recept_id' => 1,
                'namirnica_id' => 13, 
                'kolicina_namirnice' => 0.2
            ],
        ]);
    }
}

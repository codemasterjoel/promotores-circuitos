<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mision;

class MisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mision::insert([
            ['nombre'=> 'GRAN MISIÓN VIVA VENEZUELA MI PATRIA QUERIDA'],
            ['nombre'=> 'GRAN MISIÓN VENEZUELA JOVEN'],
            ['nombre'=> 'GRAN MISIÓN ABUELOS Y ABUELAS DE LA PATRIA'],
            ['nombre'=> 'GRAN MISIÓN IGUALDAD Y JUSTICIA SOCIAL'],
            ['nombre'=> 'GRAN MISIÓN CIENCIA, TECNOLOGÍA E INNOVACIÓN'],
            ['nombre'=> 'GRAN MISIÓN VENEZUELA MUJER'],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Proyectos;

class ProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyectos::create([
            'nombre'  => 'Pruebas nº1',
        ]);
    }
}

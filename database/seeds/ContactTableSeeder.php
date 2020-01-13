<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contacto de prueba para verificación de la información
        DB::table('contactos')->insert([
            'nombre'=>'Cristopher',
            'apellido'=>'Hernandez',
            'apodo'=>'Cris',
            'fecha_nac'=>date('1990-10-17'),
            'genero'=>'Masculino'
        ]);
    }
}

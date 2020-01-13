<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Teléfono de prueba para verificación de la información
        DB::table('telefonos')->insert([
            'contacto_id' => 1,
            'numero_de_telefono' => '41585285',
            'categoria' => 'Móvil'
        ]);
    }
}

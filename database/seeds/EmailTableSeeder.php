<?php

use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Correo de prueba para verificación de la información
        DB::table('emails')->insert([
            'idContacto' => 1,
            'correo' => 'obrian.hc@gmail.com',
            'categoria' => 'Personal'
        ]);
    }
}

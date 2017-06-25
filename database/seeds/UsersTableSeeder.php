<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Rosmar Blasquez',
            'description'   => 'Programador Analista',
            'email'         => 'desarrollo@scinformatica.cl',
            'password'      => bcrypt('y6f47y'),
        ]);

        DB::table('users')->insert([
            'name' => 'Tania Gonzalez',
            'description'   => 'Finanzas',
            'email' => 'finanzas@scinformatica.cl',
            'password' => bcrypt('12345'),
        ]);
/*
        DB::table('users')->insert([
            'name' => '',
            'description'   => '',
            'email' => 'informatica@scinformatica.cl',
            'password' => bcrypt('12345'),
        ]);
*/
        DB::table('users')->insert([
            'name' => 'Raul Moya',
            'description'   => 'Jefe de Proyectos y Servicios',
            'email' => 'rmoya@scinformatica.cl',
            'password' => bcrypt('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'Patricio Rodriguez',
            'description'   => '',
            'email' => 'stecnico@scinformatica.cl',
            'password' => bcrypt('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alessandra Arias',
            'description'   => 'Supervisora de Ventas',
            'email' => 'ventas@scinformatica.cl',
            'password' => bcrypt('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'Maria Lozada',
            'description'   => 'Ejecutiva de Ventas',
            'email' => 'ventas03@scinformatica.cl',
            'password' => bcrypt('12345'),
        ]);
    }
}

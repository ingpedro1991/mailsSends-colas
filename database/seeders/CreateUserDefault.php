<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class CreateUserDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => "Pedro Hernandez",
                'cedula' => "1759444571",
                'numero_celular' => '4124229123',
                'fecha_nacimiento' => '1991-07-27',
                'email' => "ing.pedro.h@gmail.com",
                'password' => 'jose4229123..',
                'rol_id' => '1',
            ],
        ];

        foreach ($users as $key => $value) {
            DB::table('users')->insert([
                'name' => $value['name'],
                'cedula' => $value['cedula'],
                'numero_celular' => $value['numero_celular'],
                'fecha_nacimiento' => $value['fecha_nacimiento'],
                'email' => $value['email'],
                'email_verified_at' => now(),
                'password' => Hash::make($value['password']),
                'rol_id' => $value['rol_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
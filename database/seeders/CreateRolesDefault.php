<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CreateRolesDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'rol' => "Admin",
            ],
            [
                'rol' => "User",
            ],
        ];

        foreach ($roles as $key => $value) {
            DB::table('roles')->insert([
                'rol' => $value['rol'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

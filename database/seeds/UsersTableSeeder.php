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
        //
        // Borramos los datos de la tabla
        // DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        for ($i=0; $i < 50; $i++) {
            DB::table('users')->insert(array(
                   'name' => 'perrito',
                   'email'  => 'perrito@perrito.com',
                   'password'  => 'perrito',
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}

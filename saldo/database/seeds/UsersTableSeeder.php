<?php

use Illuminate\Database\Seeder;

//Sempre adicionar o model que deseja usar;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Tiago Vaz',
            'email'     => 'tiago.vaz@hotmail.com',
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'Outro Usuário',
            'email'     => 'teste@email.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}

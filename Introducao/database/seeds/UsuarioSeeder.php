<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Com o filleable configurado no Model. Podemos criar registros em massa.
        $dados = [
            'name'=>'Tiago',
            'email'=>'admin@email.com',
            'password'=>bcrypt('123456')
        ];

        if (User::where('email', '=', $dados['email'])->count())
        {
            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario->update($dados);
            echo "Usuario Alterado";
        }
        else
        {
            User::create($dados);
            echo "Usuario Criado";
        }
    }
}

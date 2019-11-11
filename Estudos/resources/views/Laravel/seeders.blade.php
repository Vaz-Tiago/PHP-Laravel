@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')
	
<h5><b>php artisan make:seed NometabelaTableSeeder</b></h5>

<b>Configurando o seeder para a tabela user:</b>

<div class="codigo">
<pre wrap="true">
<code>
use Illuminate\Database\Seeder;

//Sempre adicionar o model que deseja usar;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
        * Run the database seeds.
        *
        * @@return void
        */
    public function run()
    {
        User::create([
            'name'      => 'Tiago Vaz',
            'email'     => 'tiago.vaz@hotmail.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}
</code>
</pre>
</div>

<p>
    Para que o seeder funcione, também é necessário entrar na classe DatabaseSeeder e descomentar o codigo 
    que está comentado (código que chama essa classe) e caso haja mais de uma, é só adicionar ou passar um array.
</p>

<p>Comando para rodar o seeder: </p>
<p><b>php artisan db:seed</b></p>

@endsection
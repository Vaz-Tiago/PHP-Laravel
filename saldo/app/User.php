<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Balance;
use App\Models\Historic;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    //criando o metdo que define uma relação um para muitos.
    //onde 1 usuario pode ter vários históricos

    public function historics()
    {
        return $this->hasMany(Historic::class);
    }

    public function getSender($sender)
    {
        //Entendendo a pesquisa: 
        //$this já se refere a está tabela
        //->where(): coluna name, o tipo de filtro, no caso foi o LIKE, e o valor procurado
        //->orWhere(): Equivale ao OR da query, onde é feita a busca no campo email, ao não informar o tipo da busca,
        //o laravel já entende que é  '=' (igual)
        //->get(): pega o valor que foi encontrado
        //->first(): seleciona só o primeiro registro.  
        return $this->where('name', 'LIKE', "%$sender%")
                    ->orWhere('email', $sender)
                    ->get()
                    ->first();

    }
}

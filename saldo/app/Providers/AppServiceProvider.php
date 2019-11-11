<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Adicionado para alterar o padrao da tabela
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Isso faz com que o campo default colunas que tem tamanho defindo é 191 e não 255;
        Schema::defaultStringLength(191);
    }
}

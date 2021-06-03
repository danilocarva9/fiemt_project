<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;


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
        // if(Schema::hasTable('pedidos')){
        //     $pedidos = Pedido::all();
        //     $produtos = Produto::all();
        //     $clientes = Cliente::all();
        //     View::share(['pedidos' => $pedidos, 'produtos' => $produtos, 'clientes' => $clientes]);
        // }
    }
}

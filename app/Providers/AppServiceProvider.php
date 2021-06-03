<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Cliente;

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
        if(Schema::hasTable('pedidos')){
            $pedidos = Pedido::all();
            $produtos = Produto::all();
            $clientes = Cliente::all();
            View::share(['pedidos' => $pedidos, 'produtos' => $produtos, 'clientes' => $clientes]);
        }
    }
}

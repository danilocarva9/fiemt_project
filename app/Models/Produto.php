<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
    	'nome', 'categoria_id', 'descricao', 'valor_unitario'  	
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

}

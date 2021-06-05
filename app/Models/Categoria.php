<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //use HasFactory;

    protected $table = 'categorias';

    public $timestamps = false;

    protected $fillable = [
    	'nome'
    ];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }

}


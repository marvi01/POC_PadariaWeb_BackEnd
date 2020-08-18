<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $fillable = ['nomeProd','descricao','valor','imagem','quantidade','categoria_id',"valorfinal"];
    protected $table = 'produto';
    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id');
        }
      
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable = ['id','nomeCategoria'];
    protected $table = 'categoria';
    public function produtos(){
            return $this->hasMany('App\produto', 'categoria_id');
        }
}


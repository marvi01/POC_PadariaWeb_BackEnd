<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $fillable = ['id','nomeProd','descricao','valor','imagem','quantidade'];
    protected $table = 'produto';
}

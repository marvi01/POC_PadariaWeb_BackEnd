<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produtoCopy extends Model
{
    protected $fillable = ['nomeProd','descricao','valor','imagem','quantidade',"valorfinal"];
    protected $table = 'produtoCopy';
}

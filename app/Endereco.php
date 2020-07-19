<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['id','cep','logradouro','complemento','bairro','localidade','uf','unidade','ibge','gia','users_id'];
    protected $table = 'endereco';
      
}

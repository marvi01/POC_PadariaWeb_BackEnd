<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['id','valor','Endereco_id','users_id','observacoes','confirm','updated_at','created_at'];
    protected $table = 'venda';
}

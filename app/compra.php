<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['venda_id','produto_id','users_id','updated_at','created_at'];
    protected $table = 'compra';
}

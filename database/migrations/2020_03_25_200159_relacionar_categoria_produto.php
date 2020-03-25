<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelacionarCategoriaProduto extends Migration
{
    public function up()
      {
          Schema::table('produto', function(Blueprint $table){
              $table->integer('categoria_id')->unsigned();
              $table->foreign('categoria_id')->references('id')->on('categoria');
          });
      }
  
      public function down()
      {
          Schema::table('produto', function(Blueprint $table){
              $table->dropColumn('categoria_id');
          });
      }
    
}

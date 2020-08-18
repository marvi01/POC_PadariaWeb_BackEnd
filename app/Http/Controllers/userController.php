<?php
 
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; 

 
 
class UserController extends Controller
{
    public function __construct()
    {
       // header('Access-Control-Allow-Origin*','*');
    }
    
    public function seusDados($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json(['data'=> $user,'status'=>200]);
       }else{
        return response()->json(['data'=> 'Usuario não encontrado','status'=>403]);   
       } 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::find($id);
        $dados = $request->all();
        
        if ($User) {
            $User->update($dados);
            return response()->json(['data'=>$User]);
        } else {
            return response()->json(['data'=>'Erro ao editar esse User']);
    }
}
}
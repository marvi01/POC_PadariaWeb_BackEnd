<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class categoriaController extends Controller
{
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::all();
        return response()->json(['Categoria'=>$categoria, 'status'=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $categoria = Categoria::create($dados);
        if ($categoria) {
             return response()->json(['data'=>$categoria, 'status'=>true]);
        } else {
            return response()->json(['data'=>'Erro ao criar uma categoria', 'status'=>false]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        
        if ($categoria) {
            return response()->json(['data'=>$categoria, 'status'=>true]);
       } else {
           return response()->json(['data'=>'Erro ao achar essa categoria', 'status'=>false]);
       }
        
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
        $categoria = Categoria::find($id);
        $dados = $request->all();
        
        if ($categoria) {
            $categoria->update($dados);
            return response()->json(['data'=>$categoria, 'status'=>true]);
        } else {
            return response()->json(['data'=>'Erro ao editar essa categoria', 'status'=>false]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $categoria->delete();
            return response()->json(['data'=>'Categoria removida com sucesso', 'status'=>true]);
        } else {
            return response()->json(['data'=>'Não foi possivel remover categoria', 'status'=>false]);
        }
        
    }
}

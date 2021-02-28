<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\produtoCopy;
class produtoCopyController extends Controller
{
    public function __construct()
    {
       // header('Access-Control-Allow-Origin*','*');
    }

    public function index()
    {
        $produto = produtoCopy::all();
        if($produto){
        return response()->json(['data'=> $produto,'status'=>200]);
        }else{
        return response()->json(['data'=> 'Nenhum Produto encontrado','status'=>403]); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $produto = produtoCopy::create($dados);
        if ($produto) {
            return response()->json(['data'=> $produto]);
        } else {
            return response()->json(['data'=>'Erro ao criar um produto']);
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
        $produto = produtoCopy::find($id);
        if($produto){
            return response()->json(['data'=> $produto,'status'=>200]);
            }else{
            return response()->json(['data'=> 'Nenhum Produto encontrado','status'=>403]); 
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
        $produto = produtoCopy::find($id);
        $dados = $request->all();
        
        if ($produto) {
            $produto->update($dados);
            return response()->json(['data'=>$produto]);
        } else {
            return response()->json(['data'=>'Erro ao editar esse produto']);
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
        $produto = produtoCopy::find($id);
        if ($produto) {
            $produto->delete();
            return response()->json(['data'=>'Produto removida com sucesso']);
        } else {
            return response()->json(['data'=>'Não foi possivel remover produto']);
        }
    }
}

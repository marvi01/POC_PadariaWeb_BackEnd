<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use Illuminate\Support\Facades\DB;



class compraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       // header('Access-Control-Allow-Origin*','*');
    }

    public function index()
    {
        $compra = Compra::all();
        if($compra){
        return response()->json(['data'=> $compra,'status'=>200]);
        }else{
        return response()->json(['data'=> 'Nenhum Compra encontrado','status'=>403]); 
        }
    }
    public function listCompra($id){
        $itens = DB::table('Compra')
                            ->select(DB::raw('*'))
                            ->where('users_id', '=', $id)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
        }
    }
    public function listCompraUser($id){
        $itens = DB::table('Compra')
                            ->select(DB::raw('*'))
                            ->where('users_id', '=', $id)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
        }
    }
    public function compraShow($id){
        $itens = DB::table('Compra')
                            ->select(DB::raw('*'))
                            ->where('venda_id', '=', $id)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
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
        $compra = Compra::create($dados);
        if ($compra) {
            return response()->json(['data'=> $compra]);
        } else {
            return response()->json(['data'=>'Erro ao criar uma categoria']);
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
        $Compra = Compra::find($id);
        if($Compra){
            return response()->json(['data'=> $Compra,'status'=>200]);
            }else{
            return response()->json(['data'=> 'Nenhum Compra encontrado','status'=>403]); 
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
        $Compra = Compra::find($id);
        $dados = $request->all();
        
        if ($Compra) {
            $Compra->update($dados);
            return response()->json(['data'=>$Compra]);
        } else {
            return response()->json(['data'=>'Erro ao editar esse Compra']);
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
        $Compra = Compra::find($id);
        if ($Compra) {
            $Compra->delete();
            return response()->json(['data'=>'Compra removida com sucesso']);
        } else {
            return response()->json(['data'=>'Não foi possivel remover Compra']);
        }
    }
}

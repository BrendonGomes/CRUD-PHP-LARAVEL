<?php

namespace App\Http\Controllers;

use App\Models\jogadores;
use App\Models\times;
use Illuminate\Http\Request;

class JogadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objJogadores;
    private $objTimes;

    public function __construct()
    {
        $this->objJogadores=new jogadores();
        $this->objTimes=new times();
        
    }

    public function index()
    {
        $times = $this->objTimes->all();
        $jogadores=$this->objJogadores->all();
        return view('jogadores', [
            'jogadores' => $jogadores,
            'times' => $times
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad = $this->objJogadores->create([
            'nome'=>$request->nome,
            'cpf'=>$request->cpf,
            'numero_camisa'=>$request->numero_camisa,
            'id_time'=>$request->id_time,
        ]);
        if($cad){
            return redirect('jogadores');
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
        $this->objJogadores->where(['id'=>$request->id_jogador_edit])->update([
            'nome'=>$request->nome_edit,
            'cpf'=>$request->cpf_edit,
            'numero_camisa'=>$request->numero_camisa_edit,
            'id_time'=>$request->time_edit,
        ]);
        return redirect('jogadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objJogadores->destroy($id);
    }
}

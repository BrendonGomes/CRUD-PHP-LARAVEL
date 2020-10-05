<?php

namespace App\Http\Controllers;

use App\Models\jogadores;
use App\Models\times;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $objTimes;
     private $objJogadores;

    public function __construct()
    {
        $this->objJogadores=new jogadores();
        $this->objTimes=new times();
        
    }

    public function index()
    {
        $times=$this->objTimes->all();
        return view('times', compact('times'));
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
       $cad = $this->objTimes->create([
            'nome_time'=>$request->nome_time,
        ]);
        if($cad){
            return redirect('times');
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
        $jogadores=$this->objJogadores->find($id);
        
        return view('exibirJogadores', compact('jogadores'));
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
        $this->objTimes->where(['id'=>$request->id_time])->update([
            'nome_time'=>$request->nome_time_edit,
        ]);
        return redirect('times');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objTimes->destroy($id);
    }
}

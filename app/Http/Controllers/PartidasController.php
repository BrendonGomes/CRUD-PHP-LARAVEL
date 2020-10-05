<?php

namespace App\Http\Controllers;

use App\Models\partidas;
use App\Models\times;
use Illuminate\Http\Request;

class PartidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objPartidas;
    private $objTimes;
    

    public function __construct()
    {
        $this->objPartidas=new partidas();
        $this->objTimes=new times();
        
    }

    public function index()
    {
        $times = $this->objTimes->all();
        $partidas =$this->objPartidas->all();
        return view('partidas', [
            'partidas' => $partidas,
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
        $cad = $this->objPartidas->create([
            'hora_ini'=>$request->hora_ini,
            'hora_fim'=>$request->hora_fim,
            'placara'=>$request->placara,
            'placarb'=>$request->placarb,
            'id_time_a'=>$request->id_time_a,
            'id_time_b'=>$request->id_time_b,
        ]);
        if($cad){
            return redirect('partidas');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->objPartidas->destroy($id);
    }
}

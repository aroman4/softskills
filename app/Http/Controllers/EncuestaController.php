<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Encuesta;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
 //pagina encuesta
    public function encuesta(){
        return view('encuesta.EncuestaInvInicial');
    }
    public function encuestados(){
        return view('encuesta.EncuestaInvFinal');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //dd($request);
        $encuesta = new Encuesta($request->all());
        $encuesta->id_usuario = auth()->user()->id;
        $encuesta->save();
        return redirect('/escritorioinvestigador');
    }
    public function storeencuestados(Request $request)
    {  
        //dd($request);
        $encuesta = new Encuesta($request->all());
        $encuesta->id_usuario = auth()->user()->id;
        $encuesta->save();
        return redirect('/escritorioinvestigador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        $encuesta = Encuesta::find($id);
        $encuesta = $request->all();
        $encuesta->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
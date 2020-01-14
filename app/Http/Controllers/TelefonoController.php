<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telefono;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $telefonos=Telefono::where('deleted', 0)->get();
        return $telefonos;
    }

    public function indexOf($idContact){
        $telefonos = Telefono::where('idContacto',$idContact)->where('deleted', 0)->get();
        return $telefonos;
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
        $this->validate($request,['contacto_id'=>'required', 'numero_de_telefono'=>'required', 'categoria'=>'required']);
        return Telefono::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPhone)
    {
        $telefono = Telefono::find($idPhone);
        return $telefono;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPhone)
    {
        $telefono = Telefono::find($idPhone);
        return $telefono;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPhone)
    {
        $this->validate($request, ['numero_de_telefono'=>'required', 'categoria'=>'required']);
        Telefono::find($idPhone)->update($request->all());
        return $this->onResponse(null, 'Telefono actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPhone)
    {
        $telefono = Contacto::where('id', $idPhone)->where('deleted', 0)->first();;
        $telefono->deleted = 1;
        $telefono->save();
        return $this->onResponse(null, 'Telefono eliminado exitosamente.');
    }
}

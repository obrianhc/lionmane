<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contactos=Contacto::where('deleted', 0)->with('telefonos')->with('correos')->get();
        return $contactos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['nombre'=>'required', 'apellido'=>'required', 'fecha_nac'=>'required']);
        return Contacto::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idContact
     * @return \Illuminate\Http\Response
     */
    public function show($idContact)
    {
        //
        $contacto = Contacto::find($idContact);
        return $contacto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idContact
     * @return \Illuminate\Http\Response
     */
    public function edit($idContact)
    {
        //
        $contacto = Contacto::find($idContact);
        return $contacto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idContact)
    {
        //
        $this->validate($request, ['nombre'=>'required', 'apellido'=>'required', 'fecha_nac'=>'required']);
        Contacto::find($idContact)->update($request->all());
        return $this->onResponse(null, 'Contacto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idContact
     * @return \Illuminate\Http\Response
     */
    public function destroy($idContact)
    {
        //
        $contacto = Contacto::where('id', $idContact)->where('deleted', 0)->first();;
        $contacto->deleted = 1;
        $contacto->save();
        return $this->onResponse(null, 'Contacto eliminado exitosamente.');
    }
}

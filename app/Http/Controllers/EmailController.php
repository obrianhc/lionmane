<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::where('deleted', 0)->get();
        return $emails;
    }

    public function indexOf($idContact){
        $emails = Email::where('id', $idContact)->where('deleted', 0)->get();
        return $emails;
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
        $this->validate($request,['contacto_id'=>'required', 'correo'=>'required', 'categoria'=>'required']);
        return Email::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEmail)
    {
        //
        $email = Email::find($idEmail);
        return $email;
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
        $email = Email::find($idEmail);
        return $email;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEmail)
    {
        //
        $this->validate($request, ['correo'=>'required', 'categoria'=>'required']);
        Email::find($idEmail)->update($request->all());
        return $this->onResponse(null, 'Correo actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEmail)
    {
        $email = Email::where('id', $idEmail)->where('deleted', 0)->first();;
        $email->deleted = 1;
        $email->save();
        return $this->onResponse(null, 'Correo eliminado exitosamente.');
    }
}

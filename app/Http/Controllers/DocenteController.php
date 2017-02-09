<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente; //para utilizar el modelo de Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        //
        if ($id == null){
            return Docente::orderBy('id', 'asc')->get();
      } else {
            return $this->show($id);
      }
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
        //
        $docente = new Docente;
        $docente->nombre = $request->input('nombre');
        $docente->apellido = $request->input('apellido');
        $docente->email = $request->input('email');
        $docente->save();
        //print_r($docente);
        return 'docente guardado correctamente';
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
        return Docente::find($id);
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
        //similar a store pero faltarían las validaciones
        $docente = Docente::find($id);
        $docente->nombre = $request->input('nombre');
        $docente->apellido = $request->input('apellido');
        $docente->email = $request->input('email');
        $docente->save();
        return 'docente guardado correctamente';

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
        $docente = Docente::find($id)->delete();
        return 'registro de docente eliminado correctamente';
    }
}

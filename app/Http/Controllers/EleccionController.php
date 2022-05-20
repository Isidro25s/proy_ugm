<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecciones = Eleccion::all();
        return view('eleccion/list', compact('elecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eleccion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['periodo'] = $request->periodo;
        $data['fecha'] = $request->fecha;
        $data['fechaapertura'] = $request->fechaapertura;
        $data['horaapertura'] = $request->horaapertura;
        $data['fechacierre'] = $request->fechacierre;
        $data['horacierre'] = $request->horacierre;
        $data['observaciones'] = $request->observaciones;

        $eleccion = Eleccion::create($data);

        return redirect('eleccion')->with(
            'success',
            $eleccion->periodo . ' guardado satisfactoriamente ...'
        );
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
        $eleccion = Eleccion::find($id);
        if ($eleccion) {
            return view('eleccion/edit', compact('eleccion'));
        } else {
            echo "La eleccion con id $id no existe";
        }
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
        $data['periodo'] = $request->periodo;
        $data['fecha'] = $request->fecha;
        $data['fechaapertura'] = $request->fechaapertura;
        $data['horaapertura'] = $request->horaapertura;
        $data['fechacierre'] = $request->fechacierre;
        $data['horacierre'] = $request->horacierre;
        $data['observaciones'] = $request->observaciones;

        Eleccion::whereId($id)->update($data);
        return redirect('eleccion')->with(
            'success',
            $data['periodo'] . ' editado satisfactoriamente ...'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eleccion = Eleccion::find($id);
        if (!$eleccion) {
            echo "Eleccion $id no existe en la BD";
        } else {
            Eleccion::whereId($id)->delete();
            return redirect('eleccion');
        }
    }
}
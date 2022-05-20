<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return view('rol/list', compact('roles'));
    }

    private function validateData($request)
    {
        $request->validate(
            [
                'descripcion' => 'required|max:100',
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rol/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);
        $data = [
            'descripcion' => $request->descripcion
        ];
        $rol = Rol::create($data);
        return redirect('rol')->with(
            'success',
            $data['descripcion']. ' guardado satisfactoriamente ...'
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
        $success = true;
        $message = "Operación correcta";
        $rol = Rol::find($id);
        if ($rol) {
            return view('rol/edit', compact('rol'));
        } else {
            $success = false;
            $message = "Rol con id $id, no encontrado";
        }
        return view('message', compact('message'))->with('success', $success);
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
        $this->validateData($request);
        $data = [
            'descripcion' => $request->descripcion
        ];
        Rol::whereId($id)->update($data);
        return redirect('rol')->with(
            'success',
            $data['descripcion'] . ' editado satisfactoriamente ...'
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
        $rol = Rol::find($id);
        $success = true;
        $message = "Operacion satisfactoria...";
        if ($rol) {
            Rol::whereId($id)->delete();
            return redirect('rol');
        } else {
            $success = false;
            $message = "No se encontró rol con id $id";
            return view('message', compact('message'))->with('success', $success);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();
        return view('candidato/list', compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidato/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['nombrecompleto'] = $request->nombrecompleto;
        $data['sexo'] = $request->sexo;

        $fotoName = "";
        $perfilName = "";

        if ($request->hasFile('foto')) {
            $fotoName = $request->file('foto')->getClientOriginalName();
        }
        if ($request->hasFile('perfil')) {
            $perfilName = $request->file('perfil')->getClientOriginalName();
        }

        if ($request->hasFile('foto')) $request->file('foto')->move(public_path('repositories/images'), $fotoName);
        if ($request->hasFile('perfil')) $request->file('perfil')->move(public_path('repositories/pdf'), $perfilName);


        $data['foto'] = $fotoName;
        $data['perfil'] = $perfilName;

        $candidato = Candidato::create($data);
        return redirect('candidato')->with(
            'success',
            $candidato->nombrecompleto . ' guardado satisfactoriamente ...'
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
        $candidato = Candidato::find($id);
        if ($candidato) {
            return view('candidato/edit', compact('candidato'));
        } else {
            echo "El candidato con id $id no existe";
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
        $data['nombrecompleto'] = $request->nombrecompleto;
        $data['sexo'] = $request->sexo;

        $fotoName = "";
        $perfilName = "";
        $candidato = Candidato::find($id);
        if ($request->hasFile('foto')) {
            $fotoName = $request->file('foto')->getClientOriginalName();
        } else {
            $fotoName = $candidato->foto;
        }
        if ($request->hasFile('perfil')) {
            $perfilName = $request->file('perfil')->getClientOriginalName();
        } else {
            $perfilName = $candidato->perfil;
        }

        if ($request->hasFile('foto')) $request->file('foto')->move(public_path('repositories/images'), $fotoName);
        if ($request->hasFile('perfil')) $request->file('perfil')->move(public_path('repositories/pdf'), $perfilName);


        $data['foto'] = $fotoName;
        $data['perfil'] = $perfilName;

        Candidato::whereId($id)->update($data);
        return redirect('candidato')->with(
            'success',
            $data['nombrecompleto'] . ' Editado satisfactoriamente ...'
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
        Candidato::whereId($id)->delete();
        redirect('candidato');
    }
}

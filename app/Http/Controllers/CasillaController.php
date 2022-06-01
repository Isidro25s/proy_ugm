<?php

namespace App\Http\Controllers;

use App\Models\Casilla;
use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade\Pdf;

class CasillaController extends Controller
{

    public function generatepdf()
    {
        // $casillas = Casilla::all();
        // $pdf = PDF::loadView('casilla/list', ['casillas' => $casillas]);
        // return $pdf->download('archivo.pdf');

        // $html = "<div style='text-align:center;'><h1>PDF generado desde etiquetas html</h1><br><h3>&copy;cardoso.dev</h3> </div>";
        // $pdf = PDF::loadHTML($html);
        // return $pdf->download('archivo.pdf');

        $casillas = Casilla::all();
        return PDF::loadView('casilla/list', ['casillas' => $casillas])->stream('archivo.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casillas =  Casilla::all();
        return view('casilla/list', compact('casillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('casilla/create');
    }

    private function validateData($request)
    {
        $request->validate(
            [
                'ubicacion' => 'required|max:100',
            ]
        );
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
        $data['ubicacion'] = $request->ubicacion;
        $casilla = Casilla::create($data);
        return redirect('casilla')->with(
            'success',
            $casilla->ubicacion . ' guardado satisfactoriamente ...'
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
        $casilla = Casilla::find($id);

        if ($casilla) {
            return view('casilla/edit', compact('casilla'));
        } else {
            echo "Casilla $id no existe";
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
        $this->validateData($request);
        $data['ubicacion'] = $request->ubicacion;
        Casilla::whereId($id)->update($data);
        return redirect('casilla')->with(
            'success',
            $data['ubicacion'] . ' editado satisfactoriamente ...'
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
        Casilla::whereId($id)->delete();
        return redirect('casilla');
    }
}

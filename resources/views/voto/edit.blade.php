@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Enviar votos
    </div>
    <div class="card-body">
        <div>
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            <br />
            @endif
        </div>
        <form action="{{ route('voto.update', $voto->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="eleccion_id">Elección:</label>
                <select name="eleccion_id" id="eleccion_id">
                    @foreach($elecciones as $eleccion)
                        @if($eleccion->id == $voto->eleccion_id)
                            <option selected="selected" value="{{$eleccion->id}}">{{$eleccion->periodo}}</option>
                        @else
                            <option value="{{$eleccion->id}}">{{$eleccion->periodo}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="casilla_id">Casilla:</label>
                <select name="casilla_id" id="casilla_id">
                    @foreach($casillas as $casilla)
                        @if($casilla->id == $voto->casilla_id)
                            <option selected="selected" value="{{$casilla->id}}">{{$casilla->ubicacion}}</option>
                        @else
                            <option value="{{$casilla->id}}">{{$casilla->ubicacion}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="evidencia">Evidencia:</label>
                <input type="file" class="form-control" type="file" id="evidencia" name="evidencia" accept=".pdf" onchange="preview(event, 'previewPDF');">
            </div>
            <iframe src="{{ url('/') }}/repositories/pdf/{{$voto->evidencia}}" id="previewPDF" title="preview"></iframe>
            <hr>
            <div class="form-group mb-3">
                <table class="table">
                    @foreach($voto->candidatos as $candidato)
                    <tr>
                        <td>{{$candidato->nombrecompleto}} </td>
                        <td><input type="number" value="{{$candidato->pivot->votos}}" name="candidato_{{$candidato->id}}"> </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
@endsection
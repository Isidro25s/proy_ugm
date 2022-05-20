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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('voto.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="eleccion_id">Elección:</label>
                <select name="eleccion_id" id="eleccion_id">
                    @foreach($elecciones as $eleccion)
                    <option value="{{$eleccion->id}}">{{$eleccion->periodo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="casilla_id">Casilla:</label>
                <select name="casilla_id" id="casilla_id">
                    @foreach($casillas as $casilla)
                    <option value="{{$casilla->id}}">{{$casilla->ubicacion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="evidencia">Evidencia:</label>
                <input type="file" id="evidencia" accept=".pdf" class="form-control" name="evidencia" onchange="preview(event, 'previewPDF');"/>

            </div>
            <iframe id="previewPDF" style="display:none;" title="preview"></iframe>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Candidatos</th>
                        <th>Votos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidatos as $candidato)
                    <tr>
                        <td>{{$candidato->nombrecompleto}}</td>
                        <td>
                            <input type="number" name="candidato_{{$candidato->id}}" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
@endsection
@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Eleccion
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
        <form method="POST" action="{{ route('eleccion.update', $eleccion->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                @csrf
                <label for="id">ID:</label>
                <input type="text" class="form-control" readonly="true" value="{{$eleccion->id}}" name="id" />
            </div>
            <div class="form-group">
                <label for="ubicacion">Periodo:</label>
                <input type="text" class="form-control" value="{{$eleccion->periodo}}" name="periodo" />
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" value="{{$eleccion->fecha->format('Y-m-d')}}" name="fecha" />
            </div>
            <div class="form-group">
                <label for="fechaapertura">Fecha Apertura:</label>
                <input type="date" class="form-control" value="{{$eleccion->fechaapertura->format('Y-m-d')}}" name="fechaapertura" />
            </div>
            <div class="form-group">
                <label for="horaapertura">Hora Apertura:</label>
                <input type="time" class="form-control" value="{{$eleccion->horaapertura->format('H:i')}}" name="horaapertura" />
            </div>
            <div class="form-group">
                <label for="fechacierre">Fecha Cierre:</label>
                <input type="date" class="form-control" value="{{$eleccion->fechacierre->format('Y-m-d')}}" name="fechacierre" />
            </div>
            <div class="form-group">
                <label for="horacierre">Hora Cierre:</label>
                <input type="time" class="form-control" value="{{$eleccion->horacierre->format('H:i')}}" name="horacierre" />
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control"> {{$eleccion->observaciones}} </textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
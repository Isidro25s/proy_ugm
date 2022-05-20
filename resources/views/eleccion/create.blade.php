@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Eleccion
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
        <form method="post" action="{{ route('eleccion.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="ubicacion">Periodo:</label>
                <input type="text" class="form-control" name="periodo" />
            </div>
            <div class="form-group mb-3">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" name="fecha" />
            </div>
            <div class="form-group mb-3">
                <label for="fechaapertura">Fecha Apertura:</label>
                <input type="date" class="form-control" name="fechaapertura" />
            </div>
            <div class="form-group mb-3">
                <label for="horaapertura">Hora Apertura:</label>
                <input type="time" class="form-control" name="horaapertura" />
            </div>
            <div class="form-group mb-3">
                <label for="fechacierre">Fecha Cierre:</label>
                <input type="date" class="form-control" name="fechacierre" />
            </div>
            <div class="form-group mb-3">
                <label for="horacierre">Hora Cierre:</label>
                <input type="time" class="form-control" name="horacierre" />
            </div>
            <div class="form-group mb-3">
                <label for="observaciones">Observaciones:</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
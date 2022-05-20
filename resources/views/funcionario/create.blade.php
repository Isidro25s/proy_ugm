@extends('plantilla')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper card">
    <div class="card-header">
        Agregar Casillas
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
        <form method="post" action="{{ route('funcionario.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="nombrecompleto">Nombre Completo:</label>
                <input type="text" class="form-control" name="nombrecompleto" />
            </div>
            <div class="form-group mb-3">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value='H'>Hombre</option>
                    <option value='M'>Mujer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
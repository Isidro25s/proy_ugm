@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Funcionario
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
        <form method="POST" action="{{ route('funcionario.update', $funcionario->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="id">ID:</label>
                <input type="text" class="form-control" readonly="true" value="{{$funcionario->id}}" name="id" />
            </div>
            <div class="form-group mb-3">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" value="{{$funcionario->nombrecompleto}}" class="form-control" name="nombrecompleto" />
            </div>
            <div class="form-group mb-3">
                <label for="sexo">Sexo:</label>
                @php
                $sexoH = $funcionario->sexo=='H'?" selected ":"";
                $sexoM = $funcionario->sexo=='M'?" selected ":"";
                @endphp
                <select name="sexo" id="sexo">
                    <option {{$sexoH}} value='H'>Hombre</option>
                    <option {{$sexoM}} value='M'>Mujer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
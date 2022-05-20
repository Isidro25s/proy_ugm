@extends('plantilla')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper card">
    <div class="card-header">
        Agregar Roles
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
        <form method="post" action="{{ route('rol.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" />
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Candidato
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
        <form method="POST" action="{{ route('candidato.update', $candidato->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="id">ID:</label>
                <input type="text" class="form-control" readonly="true" value="{{$candidato->id}}" name="id" />
            </div>
            <div class="form-group mb-3">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" value="{{$candidato->nombrecompleto}}" class="form-control" name="nombrecompleto" id="nombrecompleto" />
            </div>
            <div class="form-group mb-3">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" value="{{$candidato->sexo}}" class="form-control">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="foto">Foto:</label>
                <img src="{{ url('/') }}/repositories/images/{{$candidato->foto}}" id="imageCandidato" width="64px" height="64px" alt="foto">
                <input type="file" id="foto" name="foto" accept=".jpg,.png" onchange="preview(event,'imageCandidato');">
            </div>
            <div class="form-group mb-3">
                <label for="perfil">Perfil:</label>
                <iframe src="{{ url('/') }}/repositories/pdf/{{$candidato->perfil}}" id="previewPDF" title="preview"></iframe>
                <input type="file" id="perfil" name="perfil" accept=".pdf" onchange="preview(event, 'previewPDF');">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
@endsection
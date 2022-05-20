@extends('plantilla')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper card">
    <div class="card-header">
        Registrar candidatos
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
        <form method="post" action="{{ route('candidato.store') }}" onsubmit="return validateData();" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" class="form-control" id="nombrecompleto" name="nombrecompleto" />
            </div>
            <div class="form-group mb-3">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo">
                    <option value="M">Mujer</option>
                    <option value="H">Hombre</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" accept="image/png, image/jpeg" class="form-control" name="foto" onchange="preview(event,'imageCandidato');" />
                <img src="" id="imageCandidato" width="200px" heigth="200px">
            </div>
            <div class="form-group mb-3">
                <label for="perfil">Perfil:</label>
                <input type="file" id="perfil" accept="application/pdf" class="form-control" name="perfil" onchange="preview(event, 'previewPDF' );"/>
            </div>
            <iframe id="previewPDF" style="display:none;" title="preview"></iframe>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
@endsection
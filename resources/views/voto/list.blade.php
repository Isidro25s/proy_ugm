@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Eleccion</td>
                <td>Casilla</td>
                <td>Evidencia</td>
                <td>Candidatos - Votos</td>
                <td colspan="2">ACTION</td>
            </tr>
        </thead>
        <tbody>
            @foreach($votos as $voto)
            <tr>
                <td>{{$voto->id}}</td>
                <td>{{$voto->eleccion->periodo}}</td>
                <td>{{$voto->casilla->ubicacion}}</td>
                <td><a href="{{ url('/') }}/repositories/pdf/{{$voto->evidencia}}"><img src="{{ url('/') }}/repositories/images/pdf.png" height="64px" width="64px"></a></td>
                <td>
                    <table>
                        @foreach($voto->candidatos as $candidato)
                        <tr>
                            <td>{{$candidato->nombrecompleto}} - {{$candidato->pivot->votos}}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td><a href="{{ route('voto.edit', $voto->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('voto.destroy', $voto->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de borrar {{$voto->id}}')">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection
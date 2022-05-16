@extends('layouts.app-master')

@section('content')
<title>Información</title>

<table class="table mt-4" id="table-index">

    <thead>
        <tr>
            <th scope= "col">Conductor</th>
            <th scope= "col">Documento de Conductor</th>
            <th scope= "col">Modelo</th>
            <th scope= "col">Año</th>
            <th scope= "col">Técnico mecánica</th>
            <th scope= "col">SOAT</th>
            <th scope= "col">Tarjeta de propiedad</th>
            <th scope= "col">Matricula</th>
            <th scope= "col">Placa</th>
            <th scope= "col">Fecha De Vencimiento</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$vehiculo->nombreconduc}}</td>
            <td>{{$vehiculo->documentoconduc}}</td>
            <td>{{$vehiculo->modelo}}</td>
            <td>{{$vehiculo->año}}</td>
            <td>{{$vehiculo->tecnomecanica}}</td>
            <td>{{$vehiculo->soat}}</td>
            <td>{{$vehiculo->tarjetapropiedad}}</td>
            <td>{{$vehiculo->matricula}}</td>
            <td>{{$vehiculo->placa}}</td>
            <td>{{$vehiculo->fechavencimiento}}</td>
        </tr>


    </tbody>




</table>
<a href="/vehiculos"  class=" btn btn-info">Volver</a>

@endsection
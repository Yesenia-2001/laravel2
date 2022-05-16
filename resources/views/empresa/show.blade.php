@extends('layouts.app-master')

@section('content')
<title>Información</title>

<table class="table mt-4" id="table-index">

    <thead>
        <tr>
            <th scope= "col">Nombre</th>
            <th scope= "col">Dirección</th>
            <th scope= "col">Teléfono de contacto</th>
            <th scope= "col">Logo</th>
            <th scope= "col">Correo electrónico</th>
            <th scope= "col">Kit</th>
            <th scope= "col">Persona de contacto</th>
            <th scope= "col">Contraseña</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$empresa->nombrempresa}}</td>
            <td>{{$empresa->direccion}}</td>
            <td>{{$empresa->telefono}}</td>
            <td>{{$empresa->logo}}</td>
            <td>{{$empresa->correo}}</td>
            <td>{{$empresa->kit}}</td>
            <td>{{$empresa->personacontacto}}</td>
            <td>{{$empresa->contraseña}}</td>
        </tr>


    </tbody>




</table>
<a href="/empresas"  class=" btn btn-info">Volver</a>

@endsection
@extends('layouts.app-master')

@section('content')
<head><title>Vehículos</title></head>

<body class="borde-general">
  <input type="text" class="input-buscar" placeholder="Buscar">
  <a class="nav-link active" href="" class="btn btn-primary" id="boton-filtrar">Filtrar</a>

<button type="button" class="btn btn-primary" id="boton-crear" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear +
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear nuevo Vehículo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/vehiculos" method="POST" enctype="multipart/form-data" class="form-register">
    @csrf
    <div class="formu1"> 
    <div class="mb-3" id="formu1">
      <label for="" >Modelo</label>
        <input id="modelo" name="modelo" type="text" placeholder="Nombre" class="form-control" tabindex="1" required="true" value="{{ old('modelo')}}">
    </div>
    <div class="mb-3" id="formu1">
      <label for="" >Matrícula</label>
        <input id="matricula" name="matricula" type="varchar" placeholder="XYZ-123" class="form-control" tabindex="2" required="true" value="{{ old('matricula')}}">
    </div>      
    <div class="mb-3" id="formu1">
      <label for="">Nombre conductor</label>
      <input id="nombreconduc" name="nombreconduc" type="text" placeholder="Nombre" class="form-control" tabindex="3" required="true" value="{{ old('nombreconduc')}}">
    </div>
    <div class="mb-3" id="formu1">
      <label for="">Año</label>
      <input id="año" name="año" type="integer" placeholder="Nombre" class="form-control" tabindex="4" required="true" value="{{ old('año')}}">
    </div>
    <div class="mb-3" id="formu1">
      <label for="" >Técnico mecánica</label>
        <input id="tecnomecanica" name="tecnomecanica" type="file" class="form-control" tabindex="5" required="true" value="{{ old('tecnomecanica')}}">
    </div> 
</div>
    <div class="formu2">    
    <div class="mb-3" id="formu2">
      <label for="">SOAT</label>
      <input id="soat" name="soat" type="file" class="form-control" tabindex="6" required="true" value="{{ old('soat')}}">
    </div>
    <div class="mb-3" id="formu2">
      <label for="">Tarjeta de propiedad</label>
      <input id="tarjetapropiedad" name="tarjetapropiedad" type="file"  class="form-control" tabindex="7" required="true" value="{{ old('tarjetapropiedad')}}">
    </div>
    <div class="mb-3" id="formu2">
      <label for="">Placa</label>
      <input id="placa" name="placa" type="varchar" placeholder="Placa" class="form-control" tabindex="8" required="true" value="{{ old('placa')}}">
    </div>
    <div class="mb-3" id="formu2">
      <label for="">Documento conductor</label>
      <input id="documentoconduc" name="documentoconduc" placeholder="1234567890"type="integer" class="form-control" tabindex="9" required="true" value="{{ old('documentoconduc')}}">
    </div>
    <div class="mb-3" id="formu2">
      <label for="">Fecha de vencimiento</label>
      <input id="fechavencimiento" name="fechavencimiento" type="date" class="form-control" tabindex="10" required="true" value="{{ old('fechavencimiento')}}">
    </div>
  </div> 
        <div>
        <center><button type="" submit tabindex="10" class="botoncrear">Crear</button></center>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>

<table class=" table mt-4" id="tabla">
      <tr>
        <th scope="col">Modelo</th>
        <th scope="col">Matrícula</th>
        <th scope="col">Conductor</th>
        <th scope="col">Año</th>
       <!--  <th scope="col">Técnico mecánica</th>
        <th scope="col">SOAT</th>
        <th scope="col">Tarjeta de propiedad</th> -->
        <th scope="col">Placa</th>
        <th scope="col">Documento</th>
        <th scope="col">Fecha de vencimiento</th>
      </tr>
      @foreach ($vehiculos as $vehiculo)
        <tr>
          <td>{{ $vehiculo-> modelo}}</td>
          <td>{{ $vehiculo-> matricula}}</td>
          <td>{{ $vehiculo-> nombreconduc}}</td>
          <td>{{ $vehiculo-> año}}</td>
          <td>{{ $vehiculo-> placa}}</td>
         <!--  <td>{{ $vehiculo-> tecnomecanica}}</td>
          <td>{{ $vehiculo-> sot}}</td>
          <td>{{ $vehiculo-> tarjetapropiedad}}</td> -->
          <td>{{ $vehiculo-> documentoconduc}}</td>
          <td>{{ $vehiculo-> fechavencimiento}}</td>
          
          <td>
            <form action="{{route ('vehiculos.destroy',$vehiculo->id)}}" method="POST">
              <a type="button" class="btn btn-warning"href="/vehiculos/{{ $vehiculo->id}}/edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </a>
              <a type="button" class="btn btn-info" href= "{{ route('vehiculos.show',$vehiculo->id)}}">
                <svg width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>
              </a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                </svg>
              </button>
            </form>
          </td>
        </tr>
      @endforeach 
     
  </table>
</body>
@endsection


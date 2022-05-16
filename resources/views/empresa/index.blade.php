@extends('layouts.app-master')

@section('content')
<head><title>Empresas</title></head>

<body class="borde-general">
  <input type="text" class="input-buscar" placeholder="Buscar">
  <a class="nav-link active" href="" class="btn btn-primary" id="boton-filtrar">Filtrar</a>
  <button type="button" class="btn btn-primary" id="boton-crear" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Crear +
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear nueva Empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/empresas"method="POST" enctype="multipart/form-data">
    @csrf
    <div class="formu1">
        <div class="mb-3" id="formu1">
        <label for="" >Nombre Empresa</label>
            <input id="nombrempresa" name="nombrempresa" type="string" placeholder="Nombre" class="form-control" tabindex="1" require="true" >
        </div>
        <div class="mb-3" id="formu1">
        <label for="" >Dirección</label>
            <input id="direccion" name="direccion" type="char" placeholder="Cra 0# 00-00" class="form-control" tabindex="2" require="true">
        </div>      
        <div class="mb-3" id="formu1">
        <label for="">Teléfono de contácto</label>
        <input id="telefonocontacto" name="telefonocontacto" type="integer" placeholder="123456789" class="form-control" tabindex="3" require="true">
        </div>
        <div class="mb-3" id="formu1">
        <label for="">Logo</label>
        <input id="logo" name="logo" type="file" placeholder="123456789" class="form-control" tabindex="3" require="true">
        </div>
    </div>
    <div class="formu2">
        <div class="mb-3" id="formu1">
        <label for="">Correo electrónico</label>
        <input id="correo" name="correo" type="char" placeholder="Email" class="form-control" tabindex="4" require="true" pattern="[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+">
        </div>
        <div class="mb-3" id="formu1">
        <label for="">Kit</label>
        <input id="kit" name="kit" type="char" placeholder="Kit" class="form-control" tabindex="5" require="true">
        </div>
        <div class="mb-3" id="formu2">
        <label for="">Persona de contacto</label>
        <input id="personacontacto" name="personacontacto" type="string" placeholder="Nombre" class="form-control" tabindex="6" require="true">
        </div>
        <div class="mb-3" id="formu2">
        <label for="">Contraseña</label>
        <input id="contraseña" name="contraseña" type="password" placeholder="****" class="form-control" class="form-control is-valid" tabindex="7" require="true">
        </div>
    </div>
    <div>
        <center><button type=""submit tabindex="9" class="botoncrear" style="margin-top:5em">Crear</button></center>
    </div>
    </form>
      </div>
    </div>
  </div>
</div>

  <table class=" table mt-4" id="tabla">
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Dirección</th>
        <th scope="col">Télefono contacto</th>
        <th scope="col">Email</th>
        <th scope="col">Kit</th>
        <th scope="col">Persona contacto</th>
      </tr>
  
      @foreach ($empresas as $empresa)
        <tr>
          <td>{{ $empresa-> nombrempresa}}</td>
          <td>{{ $empresa-> direccion}}</td>
          <td>{{ $empresa-> telefonocontacto}}</td>
          <td>{{ $empresa-> correo}}</td>
          <td>{{ $empresa-> kit}}</td>
          <td>{{ $empresa-> personacontacto}}</td>
          <td>
          <form action="{{route ('empresas.destroy',$empresa->id)}}" method="POST">
              <a type="button" class="btn btn-warning"href="/empresas/{{ $empresa->id}}/edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </a>
              <a type="button" class="btn btn-info" href= "{{ route('empresas.show',$empresa->id)}}">
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
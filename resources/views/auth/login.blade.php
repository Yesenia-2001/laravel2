<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css')}}">
  </head>
  <body>
    <div class="containerlogin">
      @yield('content')
      <form action="/login" method="POST">
        @csrf
        <img id="logocarlogin" src="img/logocar.jpg">
        <div class="mb-3" id="div-formu">
          <label for="exampleInputEmail1" class="form-label" style="margin-top:2em">Nombre o correo electrónico</label>
          <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Recordar contraseña</label>
        </div>
        <div class="mb-3">
          <a href="/register">Crear usuario</a>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>


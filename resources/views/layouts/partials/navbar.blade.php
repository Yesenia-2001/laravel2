<nav class="navbar navbar-expand-lg navbar-light " id="nav-estilo">
    <div class="collapse navbar-collapse" id="navbarNav">
    <img id="logocar" src="img/logocar.jpg" >
      <ul class="navbar-nav">  
           <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="font-size: 24px;">Mapa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" area-current="page" href="conductores" style="font-size: 24px;">Conductores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" area-current="page" href="empresas" style="font-size: 24px;">Empresas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" area-current="page" href="vehiculos" style="font-size: 24px;">Vehículos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" area-current="page" href="#" style="font-size: 24px; width:10px; margin-left:10px;">Bienvenido</a>
          <a style="font-size: 24px; padding:0.1px; color: #AA3F3F; font-weight: bold; margin-left:22px">{{auth()->user()->username}}</a>  
          <a type="button" class="btn btn-secondary" href="/logout" style="margin-left:40px">
                <svg width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
          </a>      
        <li> <section class="circulo"></section></li>       
        </li>
      </ul>
    </div>
  </div>
</nav>
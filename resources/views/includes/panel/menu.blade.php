<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestionar Datos </h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{url('nuevo_predio')}}">
      <i class="ni ni-tv-2 text-red"></i>Predios
    </a>
  </li>
</ul>
<hr class="my-3">
<h6 class="navbar-heading text-muted">Catalogos</h6>
<ul class="navbar-nav">
@if(auth()->user()->department == 'dgti')
<li class="nav-item">
  <a class="nav-link" href="{{url('formas_adquisicion')}}">
    <i class="ni ni-atom text-info"></i> Formas de Adquisición
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('uso_tipos')}}">
    <i class="ni ni-ungroup text-orange"></i>Tipos de Uso
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('descripcion_predios')}}">
    <i class="ni ni-bullet-list-67 text-green"></i>Descripción Propiedades
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('propietarios')}}">
    <i class="ni ni-circle-08 text-orange"></i> Propietarios
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('documentos_soporte')}}">
    <i class="ni ni-paper-diploma text-primary"></i>Documentos Soporte
  </a>
</li>
@elseif(auth()->user()->department == 'catastro')
  <li class="nav-item">
    <a class="nav-link" href="{{url('formas_adquisicion')}}">
      <i class="ni ni-atom text-info"></i> Formas de Adquisición
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('uso_tipos')}}">
      <i class="ni ni-ungroup text-orange"></i>Tipos de Uso
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('descripcion_predios')}}">
      <i class="ni ni-bullet-list-67 text-green"></i>Descripción Propiedades
    </a>
  </li>
  @elseif(auth()->user()->department == 'cpatrimonial')
  <li class="nav-item">
    <a class="nav-link" href="{{url('propietarios')}}">
      <i class="ni ni-circle-08 text-orange"></i> Propietarios
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('documentos_soporte')}}">
      <i class="ni ni-paper-diploma text-primary"></i>Documentos Soporte
    </a>
  </li>
  @endif
  <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-key-25 text-info"></i>Cerrar sesíon
    </a>
    <form  action="{{route('logout')}}" method="post" style="display: none;" id="formLogout">
      @csrf
    </form>
  </li>
</ul>

<!-- Divider -->
      <hr class="my-3">
      <!-- Heading -->
      <h6 class="navbar-heading text-muted">Actividades</h6>
      <!-- Navigation -->
      <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link" href="{{url('buscar_predio')}}">
            <i class="ni ni-world text-primary"></i> Buscar predios
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://trello.com/b/w8GJuYBH/predios-municipales-salamanca" target="_blank">
            <i class="ni ni-collection text-yellow"></i> Acitividades
          </a>
        </li>
      </ul>
      <hr class="my-3">

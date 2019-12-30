<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestionar Datos </h6>

<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="./index.html">
      <i class="ni ni-tv-2 text-red"></i> Consulta de Predios
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('nuevo_predio')}}">
      <i class="ni ni-planet text-blue"></i>  Nuevo Predio
    </a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="./examples/maps.html">
      <i class="ni ni-single-02 text-orange"></i> Médicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./examples/profile.html">
      <i class="ni ni-satisfied text-info"></i> Pacientes
    </a>
  </li> -->
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
      <h6 class="navbar-heading text-muted">Reportes</h6>
      <!-- Navigation -->
      <ul class="navbar-nav mb-md-3">
        <!-- <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-collection text-yellow"></i> Frecuencia de citas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-spaceship text-red"></i> Médicos más activos
          </a>
        </li> -->

      </ul>
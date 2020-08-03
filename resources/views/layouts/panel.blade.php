<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Predios Municipales | {{config('app.name')}}</title>
  <!-- Favicon -->
  <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('css/argon.css?v=1.0.0')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/bootstrap/easyui.css">
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css"> -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
  <link type="text/css" href="{{asset('js/toastr.min.css')}}" rel="stylesheet">

  <script>
       $.extend($.fn.datagrid.defaults, {
         loader: function(param, success, error){
           var opts = $(this).datagrid('options');
           if (!opts.url) return false;

           $.ajaxSetup({
               headers: {
                   'X-CSRF-Token': $('input[name="_token"]').val()
               }
           })
           $.ajax({
             type: opts.method,
             url: opts.url,
             data: param,
             dataType: 'json',
             success: function(data){
               success(data);
             },
             error: function(){
               error.apply(this, arguments);
             }
           });
         }
         })

       </script>
       <style>
       </style>
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="{{asset('img/brand/descarga.png')}}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{asset('img/brand/user.png')}}">
              </span>
            </div>
          </a>
          @include('includes.panel.dropdown_menu')
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="{{asset('img/brand/blue.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->

        @include('includes.panel.menu')

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Panel de Administración</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Buscar" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{asset('img/brand/user.png')}}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
                </div>
              </div>
            </a>
            @include('includes.panel.dropdown_menu')
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-4 pt-md-6">
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

      @yield('content')
      <!-- Footer -->
      @include('includes.panel.footer')
    </div>
  </div>

  <!--Documents Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Documentos del Predio:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{url('eliminar_documentos')}}">
          @csrf
        <div class="form-group">
          <div class="input-group input-group-alternative mb-3">
            <div class="input-group-prepend">
              <!-- <span class="input-group-text"><i class="ni ni-hat-3"></i></span> -->
            </div>
              <div class="row">
                <div class="col-sm-8">
                    <!-- <span>Seleccionar documentos:</span> -->
                    <ul id="documents_list">

                    </ul>
                </div>
                <div class="col-sm-4">
                    <!-- <span>Ver documento</span> -->
                    <ul id="documents_view">

                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-default mt-4">Eliminar Documentos</button>
        </div>
        <br>
      </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <!-- <button type="button" class="btn btn-default">Borrar Documentos</button> -->
      </div>
    </div>
    </div>
<!-- Modal documents end -->

<!--Images Modal -->
<div class="modal fade" id="exampleModalB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelB" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Imagenes del Predio:</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="POST" action="{{url('eliminar_imagenes')}}">
        @csrf
      <div class="form-group">
        <div class="input-group input-group-alternative mb-3">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text"><i class="ni ni-hat-3"></i></span> -->
          </div>
            <div class="row">
              <div class="col-sm-8">
                  <!-- <span>Seleccionar documentos:</span> -->
                  <ul id="images_list">

                  </ul>
              </div>
              <div class="col-sm-4">
                  <!-- <span>Ver documento</span> -->
                  <ul id="images_view">

                  </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-default mt-4">Eliminar Imagenes</button>
      </div>
      <br>
    </form>
    </div>
    <div class="modal-footer">
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
      <!-- <button type="button" class="btn btn-default">Borrar Documentos</button> -->
    </div>
  </div>
  </div>
<!-- Modal images end -->

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <!-- <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script> -->
  <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('js/argon.js?v=1.0.0')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>

  <!-- more js's -->
  <script src="{{asset('js/propierties.js')}}"></script>
  <script src="{{asset('js/adquisition_shapes.js')}}"></script>
  <script src="{{asset('js/owners.js')}}"></script>
  <script src="{{asset('js/propierty_descriptions.js')}}"></script>
  <script src="{{asset('js/support_documents.js')}}"></script>
  <script src="{{asset('js/use_types.js')}}"></script>






</body>
<script>
toastr.options = {
"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": false,
"positionClass": "toast-bottom-right",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch(type){
  case 'info':
  toastr.info("{{ Session::get('message') }}");
  break;

  case 'warning':
  toastr.warning("{{ Session::get('message') }}");
  break;

  case 'success':
  toastr.success("{{ Session::get('message') }}");
  break;

  case 'error':
  toastr.error("{{ Session::get('message') }}");
  break;
}
@endif

</script>

</html>

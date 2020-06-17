@extends('layouts.panel')
@section('content')
{{Form::token()}}
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Propiedades Municipales</h3>
              <br>
            </div>
            <br>
            <div class="col text-right">
                  <!-- <a href="{{url('specialties/create')}}" class="btn btn-sm btn-success">Nueva especialidad</a> -->
            </div>
        </div>
        <form role="form" method="POST" action="{{ url('/buscar_predio')}}">
          @csrf
          <div class="row">
        <div class="col-sm-3">
          <div class="input-group input-group-alternative mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Buscar" type="text" autocomplete="off" name="buscar" id="buscar" value="{{old('buscar')}}" required autofocus >
          </div>
        </div>
        <div class="col-sm-3">
        <div class="input-group input-group-alternative mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-bold-left"></i></span>
          </div>
          <input class="form-control" placeholder="Longitud Inicial" type="number" name="long" value="{{old('long')}}"  autofocus >
        </div>
      </div>
      <div class="col-sm-3">
      <div class="input-group input-group-alternative mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-bold-right"></i></span>
        </div>
        <input class="form-control" placeholder="Longitud Final" type="number" name="long_final" value="{{old('long_final')}}"  autofocus >
      </div>
    </div>
    <div class="col-sm-3">

      <button type="submit" class="btn btn-default mt-0">Buscar</button>
    </div>

      </div>
        </form>
        <hr>
    </div>

</div>
@endsection

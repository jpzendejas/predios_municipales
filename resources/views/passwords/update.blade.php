@extends('layouts.form')
@section('title', 'Actualiza tu contraseña')
@section('subtitle', 'Ingresa tus datos para actualizar la contraseña.')
@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">

        <div class="card-body px-lg-5 py-lg-5">
          @if($errors->any())
          <div class="text-center text-muted mb-4">
            <small>Oops! se encontró un error.</small>
          </div>
          <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
          </div>
          @endif
          <form role="form" method="POST" action="{{url('/password_update')}}">
            @csrf
            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control"  name="email" placeholder="Email" type="email" value="{{old('email')}}" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Nueva Contraseña" type="password" name="password" required>

              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-default my-3">Actualizar Contraseña</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{route('password.request')}}" class="text-light"><small>¿Olvidaste tu contraseña?</small></a>
        </div>
        <div class="col-6 text-right">
          <a href="{{route('register')}}" class="text-light"><small>¿Aún no te has registrado?</small></a>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

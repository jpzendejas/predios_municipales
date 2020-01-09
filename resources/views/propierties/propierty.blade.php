@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
      <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Propiedades Municipales</h3>
          </div>
          <div class="col text-right">
            <!-- <a href="{{url('specialties/create')}}" class="btn btn-sm btn-success">Nueva especialidad</a> -->
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <center>
        <h3>PMCAT018</h3><br>
        <img src="../img/brand/logo vertical negro.png" alt="" style="height:190px;width:100%">
      </center>
    </div>
    <div class="col-sm-3">
      <h3>DATOS REGISTRABLES</h3>
      <br>
      <table class="table">
      <tbody>
        <tr>
          <td><strong>FORMA DE ADQUISICIÓN:</strong> COMPRA-VENTA<br><br><strong>AÑO DE ADQUISICIÓN:</strong> 1993<br><br><strong>TIPO Y No DE DOCUMENTO:</strong> ESCRITURA 2055<br><br><strong>NOTARIO:</strong> 19<br><br><strong>CUENTA PREDIAL:</strong> 25-P0-00339-001<br><strong>CLAVE CATASTRAL:</strong> 009-044-001</td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class="col-sm-6">
        <center><h3>UBICACIÓN</h3></center><br>
        <center>Google Maps</center>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <center>
      <h3>DESCRIPCIÓN DEL PREDIO</h3><br>
      <h5>UBICACIÓN: CALLE TUXPAN SIN NUMERO, COLONIA SAN JUAN CHIHUAHUA.</h5><br>
      <h5>USO: INSTALACIONES DE LA FERIA Y OFICINAS ADMINISTRATIVAS MUNICIPALES.</h5>
    </center>
    </div>
</div>
<div class="row">
  <div class="col-sm-3">
    <h5><strong>AREA:</strong></h5>
  </div>
  <div class="col-sm3">
    <h5>9, 738.94 M2</h5>
  </div>
</div><br>
<div class="row">
  <div class="col-sm-3">
  <h5><strong>TIPO DE PREDIO:</strong></h5>
  </div>
  <div class="col-sm-3">
  <h5>RUSTICO</h5>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <h5>VALOR CONTABLE:</h5>
  </div>
  <div class="col-sm-3">
    <h5>PARTIDA CONTABLE:</h5>
  </div>
  <div class="col-sm-3">
    <h5>ACTA NOTARIAL:</h5>
  </div>
<div class="col-sm-3">
  <h5>SESIÓN DE AYUNTAMIENTO</h5>
</div>
<div class="col-sm-3">
  <h5>ARCHIVO PDF:</h5>
</div>
</div>
<div class="row">
<div class="col-sm-12">
  <center>
    <h3>REPORTE FOTOGRAFICO</h3>
  </center>
</div>
<div class="col-sm-6">
  <center>
    <img src="../images/Captura de pantalla (2).png" alt="" style="height:190px;width:100%">
</center>
</div>
<div class="col-sm-6">
  <center>
    <img src="../images/Captura de pantalla (1).png" alt="" style="height:190px;width:100%">
</center>
</div>
</div>
<div class="row">
  <div class="col-sm-12">
    <br>
    <center>
      <h3>OBSERVACIONES:</h3>
    </center>
  </div>
</div>

  <!-- <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-1" style="background:red;">

    </div>
  </div> -->
</div>
@endsection

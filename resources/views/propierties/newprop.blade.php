@extends('layouts.panel')
@section('content')

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Predios Municipales</h3>
                </div>
                <div class="col text-right">
                  <a href="{{url('specialties/create')}}" class="btn btn-sm btn-success">Nueva especialidad</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No. Inventario</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Superficie</th>
                    <th scope="col">Uso</th>
                    <th scope="col">Situación Actual</th>
                    <th scope="col">Forma de Adquisición</th>
                    <th scope="col">Fecha de Escritura</th>
                    <th scope="col">Cuenta Predial</th>
                    <th scope="col">Clave Catastral</th>
                    <th scope="col">Acciones</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($propierties as $propierty)
                  <tr>
                    <th scope="row">
                      {{$propierty->inventory_number}}
                    </th>
                    <td>
                      {{$propierty->propierty_description->propierty_description}}
                    </td>
                    <td>
                      {{$propierty->propierty_location}}
                    </td>
                    <td>
                      {{$propierty->surface}}mt2
                    </td>
                    <td>
                      {{$propierty->use_type->use_type}}
                    </td>
                    <td>
                      {{$propierty->current_situation}}
                    </td>
                    <td>
                      {{$propierty->adquisition_shape->adquisition_shape}}
                    </td>
                    <td>
                      {{$propierty->document_date}}
                    </td>
                    <td>
                      {{$propierty->propierty_account}}
                    </td>
                    <td>
                      {{$propierty->catastral_key}}
                    </td>
                    <td>
                      <a href="{{url('/predio/'.$propierty->id)}}" class="btn btn-sm btn-primary">Ver Predio</a>
                    </td>
                  </tr>
                  @endforeach


                </tbody>
              </table>
            </div>
          </div>

@endsection

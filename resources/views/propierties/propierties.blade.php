@extends('layouts.panel')
@section('content')
{{Form::token()}}
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
    <table id="dg" title="Propiedades" class="easyui-datagrid" style="width:100%;height:40%"
            url="{{url('obtener_propiedades')}}"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>
            <tr>
                <th field="inventory_number" width="50">No.Inventario</th>
                <th field="propierty_location" width="50">Dirección</th>
                <th field="ext_number" width="50">Num Ext</th>
                <th field="int_number" width="50">Num Int</th>
                <th field="surface" width="50">Superficie/M2</th>
                <th field="book_value" width="50">Valor Contable</th>
                <th field="accounting_item" width="50">Partida Contable</th>
                <th field="notary_minutes" width="50">Acta Notarial</th>
                <th field="rpp" width="50">R.P.P.</th>
                <th field="current_situation" width="50">Situación Actual</th>
                <th field="notary" width="50">Notario</th>
                <th field="document_date" width="50">Fecha de Escritura</th>
                <th field="document_number" width="50">No. de Documento</th>
                <th field="propierty_account" width="50">Cuenta Predial</th>
                <th field="catastral_key" width="50">Clave Catastral</th>
                <th field="government_session" width="50">Sesión de Ayuntamiento</th>
                <th field="owner_name" width="50">Nombre del Propietario</th>
                <!-- <th field="register_number" width="50">No. de Registro</th> -->
                <th field="observations" width="50">Observaciones</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" id="newPropierty" class="easyui-linkbutton" iconCls="icon-add" plain="true" >Nueva Propiedad</a>
        <a href="javascript:void(0)" id="editPropierty" class="easyui-linkbutton" iconCls="icon-edit" plain="true" >Editar Propiedad</a>
        <a href="javascript:void(0)" id="viewPropierty" class="easyui-linkbutton" iconCls="icon-help" plain="true" >Ver Predio Municipal</a>
    </div>
    <div id="dlg" class="easyui-dialog" style="width:600px; height:75%;" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" enctype="multipart/form-data">
          <input type="hidden" name="department" id="department" value="{{auth()->user()->department}}">
          <div class="row">
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Numero de inventario</span>
                <input id="inventory_number" name="inventory_number" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Descripción del bien</span>
                <input id="propierty_description_id" name="propierty_description_id" style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Ubicación del inmueble</span>
                <input id="propierty_location" name="propierty_location" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Numero exterior</span>
                <input id="ext_number" name="ext_number" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Numero interior</span>
                <input id="int_number" name="int_number" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Superficie M2</span>
                <input id="surface" name="surface" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Uso</span>
                <input id="use_type_id" name="use_type_id" style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Valor contable</span>
                <input id="book_value" name="book_value" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Partida contable</span>
                <input id="accounting_item" name="accounting_item" class="easyui-textbox"  style="width:100%">
              </div>

            </div>
          </div>
          <div class="row">

            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Acta notarial</span>
                <input id="notary_minutes" name="notary_minutes" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>RPP</span>
                <input id="rpp" name="rpp" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Situación actual</span>
                <input id="current_situation" name="current_situation" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Forma de adquisición</span>
                <input id="adquisition_shape_id" name="adquisition_shape_id" style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Notario</span>
                <input id="notary" name="notary" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Fecha Escritura</span>
                <input id="document_date" type="text" name="document_date" style="width:100%">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>No. de documento</span>
                <input id="document_number" name="document_number" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Documento soporte</span>
                <input id="support_document_id" name="support_document_id" style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Cuenta predial</span>
                <input id="propierty_account" name="propierty_account" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Clave catastral</span>
                <input id="catastral_key" name="catastral_key" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Sesión de Ayuntamiento</span>
                <input id="government_session" name="government_session" class="easyui-textbox"  style="width:100%">
              </div>
            </div>
            <div class="col-sm-4">
              <div style="margin-bottom:10px">
                <span>Nombre del propietario</span>
                <input id="owner_id" name="owner_id" style="width:100%">
                <!-- <input id="owner_name" name="owner_name" class="easyui-textbox"  style="width:100%"> -->
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-sm-6">
              <div style="margin-bottom:10px">
                <span>No. de registro</span>
                <input name="register_number" class="easyui-textbox"  style="width:100%">
              </div>
            </div> -->
            <div class="col-sm-12">
              <div style="margin-bottom:10px">
                <span>Observaciones</span>
                <textarea id="observations" name="observations" rows="5" cols="80"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div style="margin-bottom:10px">
                <span>Imagenes</span>
                <input id="images" name="images[]" type="file"  style="width:100%" multiple>
              </div>
            </div>
            <div class="col-sm-6">
              <div style="margin-bottom:10px">
                <span>PDF</span>
                <input id="pdf" name="pdf" type="file"  style="width:100%">
              </div>
            </div>
          </div>
        </form>
    </div>
    <div id="dlg-buttons">
      <center>
        <a href="javascript:void(0)" id="savePropierty" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
      </center>
    </div>

</div>
@endsection

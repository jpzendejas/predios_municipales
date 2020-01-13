@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Documentos Soporte</h3>
            </div>
            <div class="col text-right">
                  <!-- <a href="{{url('specialties/create')}}" class="btn btn-sm btn-success">Nueva especialidad</a> -->
            </div>
        </div>
    </div>
<table id="dg" title="Documentos Soporte" class="easyui-datagrid" style="width:100%;height:140%;"
            url="{{'/obtener_documentos_soporte'}}"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!-- <th field="id" width="50">ID</th> -->
                <th field="support_document" width="50">Documento Soporte</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newSupportDocument" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Documento de Soporte</a>
        <a id ="editSupportDocument" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Editar Documento de Soporte</a>
        <!-- <a id ="destroyAdquisitionShape" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Forma de Adquisición</a> -->
    </div>
  <div id="dlg" class="easyui-dialog" style="width:400px"
            closed="true" buttons="#dlg-buttons">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
          {{ csrf_field() }}
            <!-- <div style="margin-bottom:20px;font-size:14px;border-bottom:1px solid #ccc">Información de Perfil</div> -->
            <!-- <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" required="true" label="First Name:" style="width:100%">
            </div> -->
            <div style="margin-bottom:10px">
              <span>Documento Soporte</span>
              <input name="support_document" class="easyui-textbox" required="true" style="width:100%">
            </div>
          </form>
    </div>
    <div id="dlg-buttons">
        <a id ="saveSupportDocument" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>
  </div>
@endsection

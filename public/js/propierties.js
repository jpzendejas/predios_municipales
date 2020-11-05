$(document).ready(function(){

  $('#dd').dialog({
  title: 'My Dialog',
  width: 700,
  height: 350,
  closed: true,
  cache: false,
  modal: true,
  resizable: true
  });
  $('#dgp').datagrid({
    url:'obtener_propiedades',
    columns:[[
        {field:'inventory_number',title:'Code',sortable:'true',width:100},
        {field:'propierty_location',title:'Ubicación',sortable:'true',width:100},
        {field:'ext_number',title:'Num ext',sortable:'true',width:100},
        {field:'int_number',title:'Num Int',sortable:'true',width:100},
        {field:'surface',title:'Superficie',sortable:'true',width:100},
        {field:'book_value',title:'Valor Contable',sortable:'true',width:100},
        {field:'accounting_item',title:'Partida Contable',sortable:'true',width:100},
        {field:'notary_minutes',title:'Acta Notarial',sortable:'true',width:100},
        {field:'rpp',title:'RPP',sortable:'true',width:100},
        {field:'utm_coordinates',title:'Coordenadas UTM',sortable:'true',width:100},
        {field:'current_situation',title:'Situación Actual',sortable:'true',width:100},
        {field:'notary',title:'Notario',sortable:'true',width:100},
        {field:'document_date',title:'Fecha de Escritura',sortable:'true',width:100},
        {field:'document_number',title:'No. de Documento',sortable:'true',width:100},
        {field:'propierty_account',title:'Cuenta Predial',sortable:'true',width:100},
        {field:'catastral_key',title:'Clave Catastral',sortable:'true',width:100},
        {field:'government_session',title:'Sesión de Ayuntamiento',sortable:'true',width:100},
        {field:'owner.owner',title:'Propietario',sortable:'true',width:100,formatter:function(value,row){return row.owner?.owner_name}},
        {field:'adquisition_shape.adquisition_shape',title:'Forma de Adquisición',sortable:'true',width:100,formatter:function(value,row){return row.adquisition_shape?.adquisition_shape}},
        {field:'propierty_description.propierty_description',title:'Descripción de Propiedad',sortable:'true',width:100,formatter:function(value,row){return row.propierty_description?.propierty_description}},
        {field:'support_document.support_document',title:'Documento Soporte',sortable:'true',width:100,formatter:function(value,row){return row.support_document?.support_document}},
        {field:'use_type.use_type',title:'Tipo de Uso',sortable:'true',width:100,align:'right',formatter:function(value,row){return row.use_type?.use_type}}
    ]]
  });
  $('#dgp').datagrid({
	onDblClickRow:function(){
    var row = $('#dgp').datagrid('getSelected');
    // get_modal_documents(row.id);
    if (row) {
    $('#dlg-menu').dialog('open').dialog('center').dialog('setTitle','Menú');
    }
	}
});
  var url;
  $('#search').textbox({
    onKeypress: function(value){
      console.log('The value has been changed to ' + value);
    }
  });

  var newPropierty=function(){
    var department = $('#department').val();
    // if(department == 'oterritorial') {
    //   $('#use_type_id').combobox({disabled:'true'});//catastro
    //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
    //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
    //   $('#support_document_id').combobox({disabled:'true'});
    //   $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
    //   $('#propierty_location').textbox({disabled:'true'});//catastro
    //   $('#ext_number').textbox({disabled:'true'});//catastro
    //   $('#int_number').textbox({disabled:'true'});//catastro
    //   $('#surface').textbox({disabled:'true'});//catastro
    //   $('#book_value').textbox({disabled:'true'});
    //   $('#accounting_item').textbox({disabled:'true'});
    //   $('#document_number').textbox({disabled:'true'});
    //   $('#propierty_account').textbox({disabled:'true'});
    //   $('#current_situation').textbox({disabled:'true'});
    //   $('#catastral_key').textbox({disabled:'true'});//catastro
    //   $('#owner_id').textbox({disabled:'true'});//catastro
    //   $('#utm_coordinates').textbox({disabled:'true'});
    // }else if (department == 'catastro'){
    //   $('#document_date').datebox({disabled:'true'});//ordenamiento
    //   $('#support_document_id').combobox({disabled:'true'});
    //   $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
    //   $('#book_value').textbox({disabled:'true'});
    //   $('#accounting_item').textbox({disabled:'true'});
    //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
    //   $('#rpp').textbox({disabled:'true'});//ordenamiento
    //   $('#notary').textbox({disabled:'true'});//ordenamiento
    //   $('#document_number').textbox({disabled:'true'});
    //   $('#propierty_account').textbox({disabled:'true'});
    //   $('#current_situation').textbox({disabled:'true'});
    //   $('#government_session').textbox({disabled:'true'});//ordenamiento
    // }else if (department == 'predial') {
    //   $('#utm_coordinates').textbox({disabled:'true'});//catastro
    //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
    //   $('#rpp').textbox({disabled:'true'});//ordenamiento
    //   $('#notary').textbox({disabled:'true'});//ordenamiento
    //   $('#government_session').textbox({disabled:'true'});//ordenamiento
    //   $('#owner_id').textbox({disabled:'true'});//
    //   $('#document_date').textbox({disabled:'true'});//ordenamiento
    //   $('#use_type_id').combobox({disabled:'true'});//catastro
    //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
    //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
    //   $('#support_document_id').combobox({disabled:'true'});
    //   $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
    //   $('#propierty_location').textbox({disabled:'true'});//catastro
    //   $('#ext_number').textbox({disabled:'true'});//catastro
    //   $('#int_number').textbox({disabled:'true'});//catastro
    //   $('#surface').textbox({disabled:'true'});//catastro
    //   $('#book_value').textbox({disabled:'true'});
    //   $('#accounting_item').textbox({disabled:'true'});
    //   $('#document_number').textbox({disabled:'true'});
    //   $('#propierty_account').textbox({disabled:'false'});
    //   $('#current_situation').textbox({disabled:'true'});
    //   $('#owner_name').textbox({disabled:'true'});//catastro
    // }
    //   else if (department == 'cpatrimonial') {
    //   $('#use_type_id').combobox({disabled:'true'});//catastro
    //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
    //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
    //   $('#document_date').datebox({disabled:'true'});//ordenamiento
    //   $('#support_document_id').combobox({disabled:'true'});
    //   $('#propierty_location').textbox({disabled:'true'});//catastro
    //   $('#ext_number').textbox({disabled:'true'});//catastro
    //   $('#int_number').textbox({disabled:'true'});//catastro
    //   $('#surface').textbox({disabled:'true'});//catastro
    //   $('#book_value').textbox({disabled:'true'});
    //   $('#accounting_item').textbox({disabled:'true'});
    //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
    //   $('#rpp').textbox({disabled:'true'});//ordenamiento
    //   $('#notary').textbox({disabled:'true'});//ordenamiento
    //   $('#document_number').textbox({disabled:'true'});
    //   $('#propierty_account').textbox({disabled:'true'});
    //   $('#current_situation').textbox({disabled:'true'});
    //   $('#catastral_key').textbox({disabled:'true'});//catastro
    //   $('#government_session').textbox({disabled:'true'});//ordenamiento
    //   $('#owner_name').textbox({disabled:'true'});//catastro
    // }
    // else if (department == 'egresos') {
    //   $('#utm_coordinates').textbox({disabled:'true'});//catastro
    //   $('#inventory_number').textbox({disabled:'true'});//catastro
    //   $('#use_type_id').combobox({disabled:'true'});//catastro
    //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
    //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
    //   $('#document_date').datebox({disabled:'true'});//ordenamiento
    //   $('#support_document_id').combobox({disabled:'true'});
    //   $('#propierty_location').textbox({disabled:'true'});//catastro
    //   $('#ext_number').textbox({disabled:'true'});//catastro
    //   $('#int_number').textbox({disabled:'true'});//catastro
    //   $('#surface').textbox({disabled:'true'});//catastro
    //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
    //   $('#rpp').textbox({disabled:'true'});//ordenamiento
    //   $('#notary').textbox({disabled:'true'});//ordenamiento
    //   $('#document_number').textbox({disabled:'true'});
    //   $('#propierty_account').textbox({disabled:'true'});
    //   $('#current_situation').textbox({disabled:'true'});
    //   $('#catastral_key').textbox({disabled:'true'});//catastro
    //   $('#government_session').textbox({disabled:'true'});//ordenamiento
    //   $('#owner_id').combobox({disabled:'true'});//catastro
    // }
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Propiedad');
    $('#fm').form('clear');
    $('#propierty_description_id').combobox({
      url:'descripcion_propiedades',
      valueField:'id',
      textField:'propierty_description'
    });
    $('#use_type_id').combobox({
      url:'tipo_usos',
      valueField:'id',
      textField:'use_type'
    });
    $('#adquisition_shape_id').combobox({
      url:'adquisicion_formas',
      valueField:'id',
      textField:'adquisition_shape'
    });
    $('#owner_id').combobox({
      url:'propietarios',
      valueField:'id',
      textField:'owner_name'
    });
    $('#document_date').datebox({
    formatter: function(date){
      var y=date.getFullYear();
      var m=date.getMonth()+1;
      var d=date.getDate();
      return y+'-'+(m<10? ('0'+ m):m)+'-'+(d<10?('0'+d):d);
    },
    parser: function(s){
      if(!s) return new Date();
      var ss= s.split('-');
      var y=parseInt(ss[0],10);
      var m=parseInt(ss[1],10);
      var d=parseInt(ss[2],10);
      if(!isNaN(y) && !isNaN(m) && !isNaN(d)){
        return new Date(y,m-1,d);
      }else{
        return new Date();
      }
    }
  });
  $('#support_document_id').combobox({
    url:'soporte_documentos',
    valueField:'id',
    textField:'support_document'
  });

      url = 'guardar_propiedad';
  }
  var savePropierty=function(){
      $('#fm').form('submit',{
          iframe:false,
          url: url,
          headers: {
              'X-CSRF-Token': $('input[name="_token"]').val()
          },
          onSubmit: function(){
              return $(this).form('validate');
          },
          success: function(result){
              var result = eval('('+result+')');
              if (result.errorMsg){
                  $.messager.show({
                      title: 'Bolsa de Empleo Salamanca, Gto',
                      msg: result.errorMsg
                  });
              } else {
                  $('#dlg').dialog('close');        // close the dialog
                  $('#dg').datagrid('reload');    // reload the user data
                  reload_page();
              }
          }
      });
  }
  var editPropierty = function(){
    var row = $('#dgp').datagrid('getSelected');
    if (row) {
      var department = $('#department').val();
      // if(department == 'oterritorial') {
      //   $('#use_type_id').combobox({disabled:'true'});//catastro
      //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
      //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
      //   $('#support_document_id').combobox({disabled:'true'});
      //   $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
      //   $('#propierty_location').textbox({disabled:'true'});//catastro
      //   $('#ext_number').textbox({disabled:'true'});//catastro
      //   $('#int_number').textbox({disabled:'true'});//catastro
      //   $('#surface').textbox({disabled:'true'});//catastro
      //   $('#book_value').textbox({disabled:'true'});
      //   $('#accounting_item').textbox({disabled:'true'});
      //   $('#document_number').textbox({disabled:'true'});
      //   $('#propierty_account').textbox({disabled:'true'});
      //   $('#current_situation').textbox({disabled:'true'});
      //   $('#catastral_key').textbox({disabled:'true'});//catastro
      //   $('#owner_id').textbox({disabled:'true'});//catastro
      //   $('#utm_coordinates').textbox({disabled:'true'});
      // }else if (department == 'catastro'){
      //   $('#document_date').datebox({disabled:'true'});//ordenamiento
      //   $('#support_document_id').combobox({disabled:'true'});
      //   $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
      //   $('#book_value').textbox({disabled:'true'});
      //   $('#accounting_item').textbox({disabled:'true'});
      //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
      //   $('#rpp').textbox({disabled:'true'});//ordenamiento
      //   $('#notary').textbox({disabled:'true'});//ordenamiento
      //   $('#document_number').textbox({disabled:'true'});
      //   $('#propierty_account').textbox({disabled:'true'});
      //   $('#current_situation').textbox({disabled:'true'});
      //   $('#government_session').textbox({disabled:'true'});//ordenamiento
      // }else if (department == 'predial') {
      //   $('#utm_coordinates').textbox({disabled:'true'});//catastro
      //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
      //   $('#rpp').textbox({disabled:'true'});//ordenamiento
      //   $('#notary').textbox({disabled:'true'});//ordenamiento
      //   $('#government_session').textbox({disabled:'true'});//ordenamiento
      //   $('#owner_id').textbox({disabled:'true'});//
      //   $('#document_date').textbox({disabled:'true'});//ordenamiento
      //   $('#use_type_id').combobox({disabled:'true'});//catastro
      //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
      //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
      //   $('#support_document_id').combobox({disabled:'true'});
      //   $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
      //   $('#propierty_location').textbox({disabled:'true'});//catastro
      //   $('#ext_number').textbox({disabled:'true'});//catastro
      //   $('#int_number').textbox({disabled:'true'});//catastro
      //   $('#surface').textbox({disabled:'true'});//catastro
      //   $('#book_value').textbox({disabled:'true'});
      //   $('#accounting_item').textbox({disabled:'true'});
      //   $('#document_number').textbox({disabled:'true'});
      //   $('#propierty_account').textbox({disabled:'false'});
      //   $('#current_situation').textbox({disabled:'true'});
      //   $('#owner_name').textbox({disabled:'true'});//catastro
      // }
      //   else if (department == 'cpatrimonial') {
      //   // $('#use_type_id').combobox({disabled:'true'});//catastro
      //   // $('#propierty_description_id').combobox({disabled:'true'});//catastro
      //   // $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
      //   // $('#document_date').datebox({disabled:'true'});//ordenamiento
      //   // $('#support_document_id').combobox({disabled:'true'});
      //   $('#propierty_location').textbox({disabled:'true'});//catastro
      //   $('#ext_number').textbox({disabled:'true'});//catastro
      //   $('#int_number').textbox({disabled:'true'});//catastro
      //   $('#surface').textbox({disabled:'true'});//catastro
      //   $('#book_value').textbox({disabled:'true'});
      //   $('#accounting_item').textbox({disabled:'true'});
      //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
      //   // $('#rpp').textbox({disabled:'true'});//ordenamiento
      //   $('#notary').textbox({disabled:'true'});//ordenamiento
      //   // $('#document_number').textbox({disabled:'true'});
      //   $('#propierty_account').textbox({disabled:'true'});
      //   // $('#current_situation').textbox({disabled:'true'});
      //   $('#catastral_key').textbox({disabled:'true'});//catastro
      //   $('#government_session').textbox({disabled:'true'});//ordenamiento
      //   $('#owner_name').textbox({disabled:'true'});//catastro
      // }
      // else if (department == 'egresos') {
      //   $('#utm_coordinates').textbox({disabled:'true'});//catastro
      //   $('#inventory_number').textbox({disabled:'true'});//catastro
      //   $('#use_type_id').combobox({disabled:'true'});//catastro
      //   $('#propierty_description_id').combobox({disabled:'true'});//catastro
      //   $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
      //   $('#document_date').datebox({disabled:'true'});//ordenamiento
      //   $('#support_document_id').combobox({disabled:'true'});
      //   $('#propierty_location').textbox({disabled:'true'});//catastro
      //   $('#ext_number').textbox({disabled:'true'});//catastro
      //   $('#int_number').textbox({disabled:'true'});//catastro
      //   $('#surface').textbox({disabled:'true'});//catastro
      //   $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
      //   $('#rpp').textbox({disabled:'true'});//ordenamiento
      //   $('#notary').textbox({disabled:'true'});//ordenamiento
      //   $('#document_number').textbox({disabled:'true'});
      //   $('#propierty_account').textbox({disabled:'true'});
      //   $('#current_situation').textbox({disabled:'true'});
      //   $('#catastral_key').textbox({disabled:'true'});//catastro
      //   $('#government_session').textbox({disabled:'true'});//ordenamiento
      //   $('#owner_id').combobox({disabled:'true'});//catastro
      // }
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Empresa');
      $('#fm').form('load',row);
      $('#propierty_description_id').combobox({
        url:'descripcion_propiedades',
        valueField:'id',
        textField:'propierty_description',
        value:row.propierty_description_id
      });
      $('#use_type_id').combobox({
        url:'tipo_usos',
        valueField:'id',
        textField:'use_type',
        value:row.use_type_id,
      });
      $('#adquisition_shape_id').combobox({
        url:'adquisicion_formas',
        valueField:'id',
        textField:'adquisition_shape',
        value:row.adquisition_shape_id
        });
        $('#owner_id').combobox({
          url:'propietarios',
          valueField:'id',
          textField:'owner_name',
          value:row.owner_id
        });
        $('#document_date').datebox({
              formatter: function(date){
                var y=date.getFullYear();
                var m=date.getMonth()+1;
                var d=date.getDate();
                return y+'-'+(m<10? ('0'+ m):m)+'-'+(d<10?('0'+d):d);
              },
              parser: function(s){
                if(!s) return new Date();
                var ss= s.split('-');
                var y=parseInt(ss[0],10);
                var m=parseInt(ss[1],10);
                var d=parseInt(ss[2],10);
                if(!isNaN(y) && !isNaN(m) && !isNaN(d)){
                  return new Date(y,m-1,d);
                }else{
                  return new Date();
                }
              }
            });
    $('#support_document_id').combobox({
      url:'soporte_documentos',
      valueField:'id',
      textField:'support_document',
      value:row.support_document_id

    });
      url = 'actualizar_propiedad/'+row.id;
    }
  }
  var viewPropierty = function(){
    $('#lista').empty();
    $('#listb').empty();
    $('#listc').empty();
    $('#listd').empty();
    $('#liste').empty();
    $('#listf').empty();


  var row = $('#dgp').datagrid('getSelected');
  if (row) {
    get_images(row.id);
    get_documents(row.id);
    get_propierty(row.id);
    get_maps_location(row.propierty_location,row.ext_number,row.int_number);
    $('#dd').dialog('open').dialog('center').dialog('setTitle','Información');
  }

  }
  function get_propierty(id){
    $.ajax({
      method:'GET',
      dataType:'json',
      url:"obterner_predio/"+id,
      success: function(response){
        $.each(response, function(index, value){
          $('#lista').append('<label>Numero de Inventario: <strong>'+value.inventory_number+'</strong></label>');
          $('#lista').append('<br><label>Dirección: <strong>'+value.propierty_location+'</strong></label>');
          $('#lista').append('<br><label>Numero Exterior: <strong>'+value.ext_number+'</strong></label>');
          $('#lista').append('<br><label>Numero Interior: <strong>'+value.int_number+'</strong></label>');
          $('#lista').append('<br><label>Superficie: <strong>'+value.surface+' mt2</strong></label>');
          $('#lista').append('<br><label>Valor  Contable: <strong>$'+value.book_value+'</strong></label>');
          $('#lista').append('<br><label>Cuenta Contable: <strong>'+value.accounting_item+'</strong></label>');
          $('#lista').append('<br><label>Acta Notarial: <strong>'+value.notary_minutes+'</strong></label>');
          $('#lista').append('<br><label>RPP: <strong>'+value.rpp+'</strong></label>');
          $('#lista').append('<br><label>Situación Actual: <strong>'+value.current_situation+'</strong></label>');
          $('#lista').append('<br><label>Notario: <strong>'+value.notary+'</strong></label>');
          $('#listb').append('<label>Fecha de Escritura: <strong>'+value.document_date+'</strong></label>');
          $('#listb').append('<br><label>Numero de Documento: <strong>'+value.document_number+'</strong></label>');
          $('#listb').append('<br><label>Cuenta Predial: <strong>'+value.propierty_account+'</strong></label>');
          $('#listb').append('<br><label>Coordenadas: <strong>'+value.utm_coordinates+'</strong></label>');
          $('#listb').append('<br><label>Sesión de Ayuntamiento: <strong>'+value.government_session+'</strong></label>');
          $('#listb').append('<br><label>Propietario: <strong>'+value.owner.owner_name+'</strong></label>');
          $('#listb').append('<br><label>Descripción del Predio: <strong>'+value.propierty_description.propierty_description+'</strong></label>');
          $('#listb').append('<br><label>Tipo de Uso: <strong>'+value.use_type.use_type+'</strong></label>');
          $('#listb').append('<br><label>Forma de Adquisición: <strong>'+value.adquisition_shape.adquisition_shape+'</strong></label>');
          $('#listb').append('<br><label>Documento Soporte: <strong>'+value.support_document.support_document+'</strong></label>');
          $('#listc').append('<label><strong>'+value.observations+'</strong></label>');
          $('#listf').append('<label><strong>Vista en Maps: </strong></label>');
          $('#listf').append('<br><a href="https://earth.google.com/web/search/'+value.propierty_location+'Salamanca, Gto., México" target="_blank">Mapa</a>');
        });
      }
    });
  }
  function get_images(id){
    var ind;
    $('#listd').append('<label><strong>Imagenes: </strong></label>');
    $.ajax({
      method:'GET',
      dataType:"json",
      url:"obtener_imagenes/"+id,
      success: function(response){
        console.log(response);
        $.each(response, function(index, value){
          ind = index+1;
          $('#listd').append('<br><a href="http://salamanca.gob.mx/predios_municipales/public/images/'+value.image+'" target="_blank">Imagen '+ind+'</a>');
        });
      }
    });
  }
  function get_documents(id){
    $('#liste').append('<label><strong>Documentos: </strong> </label>');
    $.ajax({
      method:'GET',
      dataType:"json",
      url:"obtener_documentos/"+id,
      success:function(response){
        $.each(response, function(index, value){
          $('#liste').append('<br><a href="http://salamanca.gob.mx/predios_municipales/public/documents/'+value.document_name+'" target="_blank">Documento</a>');
        });
      }
    });
  }
  function get_modal_documents(id){
    $.ajax({
      method:'GET',
      dataType:"json",
      url:"obtener_documentos/"+id,
      success:function(response){
        if(response.length == 0) {
          toastr.warning('Para este predio aún no hay documentos registrados');
        }else {
          $('#documents_list').empty();
          $('#documents_view').empty();
          $('#exampleModal').modal('show');
          $.each(response, function(index, value){
            $('#documents_list').append('<li><input type="checkbox" id="'+index+'" name="ids[]" value="'+value.id+'"><label for="'+index+'">Documento: '+index+'</label></li>');
            $('#documents_view').append('<li><a href="http://salamanca.gob.mx/predios_municipales/public/documents/'+value.document_name+'" target="_blank">Documento</a></li>');
          });
      }
    }
    });
  }
  function get_maps_location(location,ext_number,int_number){
    console.log(location);
    console.log(ext_number);
    console.log(int_number);
}
var searchPropierty = function(){
  var search = $('#search').val();
  $('#dgp').datagrid('load',{
    search:$('#search').val(),
    min_long:$('#min_long').val(),
    max_long:$('#max_long').val(),
  })
}
function reload_page(){
  location.reload();
}

var deleteDocument = function(){
  var row = $('#dgp').datagrid('getSelected');
  if (row) {
    $('#dlg-menu').dialog('close');        // close the dialog
    get_modal_documents(row.id);
  }
}
var deleteImage = function(){
  var row = $('#dgp').datagrid('getSelected');
  if (row) {
    $('#dlg-menu').dialog('close');        // close the dialog
    get_modal_images(row.id);
  }
}

function get_modal_images(id){
  var ind;
  $.ajax({
    method:'GET',
    dataType:"json",
    url:"obtener_imagenes/"+id,
    success: function(response){
      console.log(response);
        if(response.length == 0) {
          toastr.warning('Para este predio aún no hay imagenes registradas');
        }else {
          $('#images_list').empty();
          $('#images_view').empty();
          $('#exampleModalB').modal('show');
          $.each(response, function(index, value){
            $('#images_list').append('<li><input type="checkbox" id="'+index+'" name="img_ids[]" value="'+value.id+'"><label for="'+index+'">Imagen: '+index+'</label></li>');
            $('#images_view').append('<li><a href="http://salamanca.gob.mx/predios_municipales/public/images/'+value.image+'" target="_blank">Imagen</a></li>');
          });
        }
    }
  });
}

var locationPlace = function(){
  var row = $('#dgp').datagrid('getSelected');
  if (row) {
    $('#dlg-menu').dialog('close');        // close the dialog
    if (row.utm_coordinates == null) {
      toastr.warning('Para este predio aún no hay coordenadas registradas');
    }else {
      convertCoordinates(row.utm_coordinates);
    }
  }
}
function convertCoordinates(utm_coordinates){
  if (utm_coordinates) {
    $.ajax({
      method:'GET',
      dataType:"json",
      url:"obtener_coordenadas/"+utm_coordinates,
      success: function(data){
        console.log(data);
        window.open("https://earth.google.com/web/search/"+data+"/", "_blank");
      }
    });
  }
}

$('#newPropierty').on('click', newPropierty);
$('#savePropierty').on('click', savePropierty);
$('#editPropierty').on('click', editPropierty);
$('#viewPropierty').on('click', viewPropierty);
$('#searchPropierty').on('click', searchPropierty);
$('#deleteDocument').on('click', deleteDocument);
$('#deleteImage').on('click', deleteImage);
$('#locationPlace').on('click', locationPlace);


});

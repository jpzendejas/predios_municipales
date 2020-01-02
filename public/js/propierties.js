$(document).ready(function(){
  var url;

  var newPropierty=function(){
    var department = $('#department').val();
    if(department == 'oterritorial') {
      $('#use_type_id').combobox({disabled:'true'});//catastro
      $('#propierty_description_id').combobox({disabled:'true'});//catastro
      $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
      $('#support_document_id').combobox({disabled:'true'});
      $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
      $('#propierty_location').textbox({disabled:'true'});//catastro
      $('#ext_number').textbox({disabled:'true'});//catastro
      $('#int_number').textbox({disabled:'true'});//catastro
      $('#surface').textbox({disabled:'true'});//catastro
      $('#book_value').textbox({disabled:'true'});
      $('#accounting_item').textbox({disabled:'true'});
      $('#document_number').textbox({disabled:'true'});
      $('#propierty_account').textbox({disabled:'true'});
      $('#current_situation').textbox({disabled:'true'});
      $('#catastral_key').textbox({disabled:'true'});//catastro
      $('#owner_name').textbox({disabled:'true'});//catastro
    }else if (department == 'catastro'){
      $('#document_date').datebox({disabled:'true'});//ordenamiento
      $('#support_document_id').combobox({disabled:'true'});
      $('#inventory_number').textbox({disabled:'true'});//controlpatrimonial
      $('#book_value').textbox({disabled:'true'});
      $('#accounting_item').textbox({disabled:'true'});
      $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
      $('#rpp').textbox({disabled:'true'});//ordenamiento
      $('#notary').textbox({disabled:'true'});//ordenamiento
      $('#document_number').textbox({disabled:'true'});
      $('#propierty_account').textbox({disabled:'true'});
      $('#current_situation').textbox({disabled:'true'});
      $('#government_session').textbox({disabled:'true'});//ordenamiento
      }else if (department == 'cpatrimonial') {
      $('#use_type_id').combobox({disabled:'true'});//catastro
      $('#propierty_description_id').combobox({disabled:'true'});//catastro
      $('#adquisition_shape_id').combobox({disabled:'true'});//catastro
      $('#document_date').datebox({disabled:'true'});//ordenamiento
      $('#support_document_id').combobox({disabled:'true'});
      $('#propierty_location').textbox({disabled:'true'});//catastro
      $('#ext_number').textbox({disabled:'true'});//catastro
      $('#int_number').textbox({disabled:'true'});//catastro
      $('#surface').textbox({disabled:'true'});//catastro
      $('#book_value').textbox({disabled:'true'});
      $('#accounting_item').textbox({disabled:'true'});
      $('#notary_minutes').textbox({disabled:'true'});//ordenamiento
      $('#rpp').textbox({disabled:'true'});//ordenamiento
      $('#notary').textbox({disabled:'true'});//ordenamiento
      $('#document_number').textbox({disabled:'true'});
      $('#propierty_account').textbox({disabled:'true'});
      $('#current_situation').textbox({disabled:'true'});
      $('#catastral_key').textbox({disabled:'true'});//catastro
      $('#government_session').textbox({disabled:'true'});//ordenamiento
      $('#owner_name').textbox({disabled:'true'});//catastro
    }
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Propiedad');
    $('#fm').form('clear');
    $('#propierty_description_id').combobox({
      url:'/descripcion_propiedades',
      valueField:'id',
      textField:'propierty_description'
    });
    $('#use_type_id').combobox({
      url:'/tipo_usos',
      valueField:'id',
      textField:'use_type'
    });
    $('#adquisition_shape_id').combobox({
      url:'/adquisicion_formas',
      valueField:'id',
      textField:'adquisition_shape'
    });
    $('#owner_id').combobox({
      url:'/propietarios',
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
    url:'/soporte_documentos',
    valueField:'id',
    textField:'support_document'
  });

      url = '/guardar_propiedad';
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
              }
          }
      });
  }
  var editPropierty = function(){
    var row = $('#dg').datagrid('getSelected');
    if (row) {
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Empresa');
      $('#fm').form('load',row);
      $('#propierty_description_id').combobox({
        url:'/descripcion_propiedades',
        valueField:'id',
        textField:'propierty_description',
        value:row.propierty_description_id
      });
      $('#use_type_id').combobox({
        url:'/tipo_usos',
        valueField:'id',
        textField:'use_type',
        value:row.use_type_id,
      });
      $('#adquisition_shape_id').combobox({
        url:'/adquisicion_formas',
        valueField:'id',
        textField:'adquisition_shape',
        value:row.adquisition_shape_id
        });
        $('#owner_id').combobox({
          url:'/propietarios',
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
      url:'/soporte_documentos',
      valueField:'id',
      textField:'support_document',
      value:row.support_document_id

    });
      url = 'actualizar_propiedad/'+row.id;
    }
  }
  var viewPropierty = function(){

  var row = $('#dg').datagrid('getSelected');
  if (row) {
    $('#dd').dialog({
    title: 'My Dialog',
    width: 700,
    height: 350,
    closed: false,
    cache: false,
    modal: true
    });
    $.ajax({
      method:'GET',
      dataType:'json',
      url:"/obterner_predio/"+row.id,
      data:{'id':row.id},
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
          $('#listc').append('<label>Observaciones: <strong>'+value.observations+'</strong></label>');
        });
      }
    });
    $('#dd').dialog('open').dialog('center').dialog('setTitle','Información del Predio');

  }

  }

$('#newPropierty').on('click', newPropierty);
$('#savePropierty').on('click', savePropierty);
$('#editPropierty').on('click', editPropierty);
$('#viewPropierty').on('click', viewPropierty);
});

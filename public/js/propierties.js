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

$('#newPropierty').on('click', newPropierty);
$('#savePropierty').on('click', savePropierty);
$('#editPropierty').on('click', editPropierty);
});

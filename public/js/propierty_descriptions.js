$(document).ready(function(){
  var url;

  var newPropiertyDescription = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Descripción de Predio');
      $('#fm').form('clear');
      url = 'save_propierty_description';
  }

  var editPropiertyDescription=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Descripción de Predio');
          $('#fm').form('load',row);
          url = 'update_propierty_description/'+row.id;
      }
  }
  var savePropiertyDescription=function(){
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
                      title: 'OMC Calibrations',
                      msg: result.errorMsg
                  });
              } else {
                  $('#dlg').dialog('close');        // close the dialog
                  $('#dg').datagrid('reload');    // reload the user data
              }
          }
      });
  }
  var destroyAdquisitionShape=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('OMC Calibrations','Eliminar Forma de Adquisición?',function(r){
              if (r){
                  $.post('destroy_status',{id:row.id},function(result){
                      if (result.success){
                          $('#dg').datagrid('reload');    // reload the user data
                      } else {
                          $.messager.show({    // show error message
                              title: 'OMC Calibrations',
                              msg: result.errorMsg
                          });
                      }
                  },'json');
              }
          });
      }
  }
$('#newPropiertyDescription').on('click', newPropiertyDescription);
$('#savePropiertyDescription').on('click', savePropiertyDescription);
$('#editPropiertyDescription').on('click', editPropiertyDescription);
// $('#destroyPropiertyDescription').on('click', destroyPropiertyDescription);

});

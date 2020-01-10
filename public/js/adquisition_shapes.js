$(document).ready(function(){
  var url;

  var newAdquisitionShape = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Forma de Adquisición');
      $('#fm').form('clear');
      url = 'save_adquisition_shape';
  }

  var editAdquisitionShape=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Froma de Adquisición');
          $('#fm').form('load',row);
          url = 'update_adquisition_shape/'+row.id;
      }
  }
  var saveAdquisitionShape=function(){
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
$('#newAdquisitionShape').on('click', newAdquisitionShape);
$('#saveAdquisitionShape').on('click', saveAdquisitionShape);
$('#editAdquisitionShape').on('click', editAdquisitionShape);
$('#destroyAdquisitionShape').on('click', destroyAdquisitionShape);

});

$(document).ready(function(){
  var url;

  var newOwner = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Propietario');
      $('#fm').form('clear');
      url = 'save_owner';
  }

  var editOwner=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Propietario');
          $('#fm').form('load',row);
          url = 'update_owner/'+row.id;
      }
  }
  var saveOwner=function(){
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
  var destroyOwner=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('OMC Calibrations','Eliminar Propietario?',function(r){
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
$('#newOwner').on('click', newOwner);
$('#saveOwner').on('click', saveOwner);
$('#editOwner').on('click', editOwner);
$('#destroyOwner').on('click', destroyOwner);

});

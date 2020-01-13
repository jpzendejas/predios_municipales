$(document).ready(function(){
var url;
var newUseType = function(){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Documento Soporte');
    $('#fm').form('clear');
    url = 'save_use_type';
}

var editUseType=function(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Documento Soporte');
        $('#fm').form('load',row);
        url = 'update_use_type/'+row.id;
    }
}
var saveUseType=function(){
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
var destroyUseType=function(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $.messager.confirm('OMC Calibrations','Eliminar Documento Soporte?',function(r){
            if (r){
                $.post('destroy_support_document',{id:row.id},function(result){
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
$('#newUseType').on('click', newUseType);
$('#saveUseType').on('click', saveUseType);
$('#editUseType').on('click', editUseType);
$('#destroyUseType').on('click', destroyUseType);
});

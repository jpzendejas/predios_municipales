$(document).ready(function(){
var url;
var newSupportDocument = function(){
    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Documento Soporte');
    $('#fm').form('clear');
    url = 'save_document_support';
}

var editSupportDocument=function(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Documento Soporte');
        $('#fm').form('load',row);
        url = 'update_document_support/'+row.id;
    }
}
var saveSupportDocument=function(){
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
var destroySupportDocument=function(){
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
$('#newSupportDocument').on('click', newSupportDocument);
$('#saveSupportDocument').on('click', saveSupportDocument);
$('#editSupportDocument').on('click', editSupportDocument);
$('#destroySupportDocument').on('click', destroySupportDocument);
});

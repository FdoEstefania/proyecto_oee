$(document).ready(function(){
    
    /*** Tabla de datos sucursal*/
    $("#tblS").DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "sPaginationType": "full_numbers"
    });

    /**** Actualizar una sucursal*/
    $(document).on('submit', '#frmSuc', function(event){
        event.preventDefault();
        var nom = $('#txtNom').val();
        var dir = $('#txtDir').val();
        //alert(nom + dir);
        if(nom != '' && dir != '')
        {
            $('#mdSuc').modal('hide');
            $.ajax({
                url:"formSucursal.php",
                method:'POST',
                data:{
                    txtNom:nom,
                    txtDir:dir
                },
                success:function(data)
                {
                    alert(data);
                    $('#frmSuc')[0].reset();
                    $(location).attr('href', 'sucursales.php');
                }
            });
        }
        else
        {
            alert("Error en los datos");
        }
    });
    
    /*** Eliminar una sucursal*/
    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        if(confirm("Eliminar Sucursal?"))
        {
            $(location).attr('href', 'sucursales.php?delete_sucursal='+id);
        }
        else
        {
            return false;	
        }
    });

});
$(document).ready(function(){

    $('#tblmaqinas').DataTable();

    //Combobox sucursales 
    $("#cbxSuc").on('change', function(event){
        event.preventDefault();
        var fk_sucursal = $('#cbxSuc').val()
        //alert(fk_sucursal);
        $.ajax({
            type: 'POST',
            url: '../inc/tblMaquinas.php',
            data: {
                'fk_sucursal': fk_sucursal
            },
            success:function(data)
            {
                $('#tblMaquinas').html(data);
            }
        });

    });

    //JavaScript para eliminar una maquina
    $(document).on('click', '.delete_maq', function(){
        var codm = $(this).attr("id");
        if(confirm("Eliminar Maquina?"))
        {
            $.ajax({
                url:"../inc/tblMaquinas.php",
                method:"POST",
                data:{codm:codm},
                success:function(data){
                    $('#tblMaquinas').html(data);

                }
            });
        }
        else
        {
            return false;	
        }
    });

    //Ajax para agragar una maquina nueva
    $(document).on('submit', '#frmMaq', function(event){
        event.preventDefault();
        var suc = $('#cbxModal').val();
        var nom = $('#txtNom').val();
        var vel = $('#txtVel').val();
        var mod = $('#txtMod').val();
        //alert(suc);
        if(suc == 'Seleccionar'){
            alert('Selecione una sucursal');
            return false;
        }
        if(nom != ''){
            if(vel != ''){
                if(mod != ''){
                    $('#mdSuc').modal('hide');
                    $.ajax({
                        type: 'POST',
                        url:"formMaquinas.php",
                        data:{
                            'txtNom':nom,
                            'txtVel':vel,
                            'txtMod':mod,
                            'cbxModal':suc
                        }
                    })
                        .done(function(data){
                        alert(data);
                        $('#frmMaq')[0].reset();
                        //location.reload();
                    })
                        .fail(function(xhr) {
                        alert('hubo un error!!!');
                    })
                }
                else{
                    alert('Debe ingresar un modelo');
                }
            }
            else{
                alert('Debe ingresar un velocidad de produccion');
            }
        }
        else{
            alert('Debe ingresar un nombre');
        }
    });

});
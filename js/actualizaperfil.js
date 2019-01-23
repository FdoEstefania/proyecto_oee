$(document).ready(function(){

    $("#form_perfil").on('submit', function(event){
        event.preventDefault();
        var confir = confirm('Actualizar datos');
        if(confir){
            var pssw = $("#txtPass").val();
            var rpssw = $('#txtRePass').val();
            if(pssw != "" )
            {
                if(pssw != rpssw)
                {
                    $('#error').html('<label class="text-danger">Las contraseñas no coinciden</label>');
                    return false;
                }
                else
                {
                    $('#error').html('');
                }
            }
            $("#btnPerfil").attr('disabled', 'disabled');
            var frm = $(this).serialize();
            $("#txtRePass").attr('required',false);
            $.ajax({
                url:"../datos/actualizarPeril.php",
                method:"POST",
                data:frm,
                success:function(data)
                {
                    $("#btnPerfil").attr('disabled', false);
                    $("#txtPass").val('');
                    $("#txtRePass").val('');
                    $("#msg").html(data);
                }
            })
        }

    });
});

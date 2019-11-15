$(document).ready(function(){
  
  $(".btn_editar").hide();

  $(".btn_modal").click(function(){
    $( ".btn_guardar").show();
    $( ".btn_editar").hide();
    $("#header_modal").text("Nuevo Usuario");
  });

  $(".btn_estado").on("click", function(){
    var id = $(this).attr("data-id");
    var estado = $(this).attr("data-estado");

    $.post(base_url+"usuarios/estado_usuario",{
        id_usuario : id,
        estado: estado
    },function(respuesta){

      if (respuesta == "ACTIVED") {
        swal({title: "Usuario Activado",icon: "success",}).then((value) => {
          if(value)location.reload();
        });
      }
      else{
        swal({title: "Usuario Desactivado",icon: "error",}).then((value) => {
          if(value)location.reload();
        });
      }
      
    });
  });

  $(".btn_editar").on("click", function(){
      var data = {
        "username" : $("#username").val(),
        "password" : $("#password").val(),
        "permisos" : $("#id_permisos").val(),
      }
      var id = $(this).attr('data-id');
      if ($("#username").val() == "" || $("#password").val() == "") {
        swal({title: "Debes llenar todos los campos",icon: "warning",button: "CERRAR"});
  
      }
      else if ($("#id_permisos")[0].selectedIndex == 0) {
        swal({title: "Debes Seleccionar Un Permiso",icon: "warning",button: "CERRAR"});
      }
      else{
        $.post(base_url+"usuarios/actualizar_usuario",{
          data : data,
          id_usuario : id
        },function(respuesta){
            swal({title: "Usuario Actualizado",icon: "info",}).then((value) => {
                if(value)location.reload();
            });
        });
      }
  })

  $(".btn_guardar").on("click", function(){
    var data = {
      "username" : $("#username").val(),
      "password" : $("#password").val(),
      "permisos" : $("#id_permisos").val(),
    }
    if ($("#username").val() == "" || $("#password").val() == "") {
      swal({title: "Debes llenar todos los campos",icon: "warning",button: "CERRAR"});

    }
    else if ($("#id_permisos")[0].selectedIndex == 0) {
      swal({title: "Debes Seleccionar Un Permiso",icon: "warning",button: "CERRAR"});
    }
    else{
      $.post(base_url+"usuarios/alta_usuario",{
        data : data
      },function(respuesta){
        if(respuesta == 1){
          swal({
          title: "Usuario Registrado",
          icon: "success",
          button: "ACEPTAR",
        }).then((value) => {
          location.reload();
        });
      }else{
        swal({title: "Error al Registrar Usuario ",icon: "error",button: "CERRAR"});
      }
      });
    }
  });

  $(".vista_productos").on("click", function(){
    $(".btn_guardar").hide(); 
    $(".btn_editar").show();
    var id = $(this).attr('data-id');


    $.post(base_url+"usuarios/detalle",{
            id_usuario : id
    },function(respuesta){
        let datos = JSON.parse(respuesta);

        $("#username").val(datos.username);
        $("#password").val(datos.password);
        $("#id_permisos").val(datos.permisos);
        $(".btn_editar").attr('data-id',datos.id_usuario);
        $("#header_modal").text("Actualizar Usuario");
      });
  });
});
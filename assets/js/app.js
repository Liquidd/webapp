$(document).ready(function(){
    $(".btn_logout").on("click", function(){
      $.post(base_url+"login/logout",{},function(respuesta){
          console.log("usuario deslogeado");
          location.href = base_url+"login";
      });
    });
    $(".btn_home").on("click", function(){
        $.post(base_url+"usuarios",{},function(respuesta){
          console.log("home");
        });
    });
    $(".btn_login").on("click", function(){
      console.log($("#username").val());
      console.log($("#password").val());
      $.post(base_url+"/login/validacion",{
          username : $("#username").val(),
          password : $("#password").val()
      },function(respuesta){
        console.log(respuesta);
        if(respuesta > 0){
          location.href = base_url+"usuarios";
        }else{
          swal({title: "Usuario / Contraseña Incorrectas",icon: "warning",button: "CERRAR"});
        }
      });
    });
  });
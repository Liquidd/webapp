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
      if ($("#username").val() == "" || $("#password").val() == "") {
        swal({title: "Ingresa Usuario y Contraseña",icon: "warning",button: "CERRAR"});
      }
      else{
        $.post(base_url+"/login/validacion",{
            username : $("#username").val(),
            password : $("#password").val()
        },function(respuesta){
          if(respuesta > 0){
            location.href = base_url+"usuarios";
          }else{
            swal({title: "Usuario / Contraseña Incorrectas",icon: "warning",button: "CERRAR"});
          }
        });
      }
    });
    //nav
    $(".About").on("click", function(){
      location.href = base_url+"Usuarios/about";
    });
    $(".Packages").on("click", function(){
      location.href = base_url+"Usuarios/packages";
    });
    $(".Blog").on("click", function(){
      location.href = base_url+"Usuarios/blog";
    });
    $(".Contact").on("click", function(){
      location.href = base_url+"Usuarios/contact";
    });
    $(".Home").on("click", function(){
      location.href = base_url+"Usuarios/home";
    });
    $(".Inicio").on("click", function(){
      location.href = base_url+"login";
    });
  });
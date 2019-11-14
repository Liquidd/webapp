<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Controlador_general.php');
class Usuarios extends Controlador_general {

    public function __construct(){
        parent::__construct();
        $this->load->model("usuarios_m",'',TRUE);
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->estado_sesion) {
            $this->session->sess_destroy();
            redirect("login");
        }
    }

    public function index()
    {
            $lista_usuarios = $this->usuarios_m->lista_usuarios();
            $array_usuarios = array();
    
            if($lista_usuarios !== FALSE)
            foreach ($lista_usuarios as $key => $values) {
                    $array_usuarios[$key]['id_usuario']=$values['id_usuario'];
                    $array_usuarios[$key]['username']=$values['username'];
                    $array_usuarios[$key]['password']=$values['password'];
                    $array_usuarios[$key]['permisos']=$values['permisos'];
                    $array_usuarios[$key]['estado']=$values['estado'];
    
            }
            $this->view('inicio',array("usuarios" =>$array_usuarios));
    }

    public function alta_usuario()
    {
        $data = $this->input->post("data");
        $respuesta = $this->usuarios_m->alta_usuario($data["username"],$data["password"],$data["permisos"]);
        echo $respuesta;
    }
    public function actualizar_usuario()
    {
        $data = $this->input->post("data");
        $id_usuario = $this->input->post("id_usuario");
        $respuesta = $this->usuarios_m->actualizar_usuario($data["username"],$data["password"],$data["permisos"],$id_usuario);
        echo $respuesta;
    }
    public function estado_usuario()
    {
        $id_usuario = $this->input->post("id_usuario");
        $estado = $this->input->post("estado");
        $respuesta = $this->usuarios_m->estado_usuario($id_usuario,$estado);
        echo $respuesta;

    }
    public function detalle()
    {
		$id_usuario = $this->input->post("id_usuario");
        $respuesta = $this->usuarios_m->lista_usuarios($id_usuario);
        echo json_encode($respuesta[0]);
    }
    public function holaUsuarios()
    {
        echo "hola usuarios";
    }

}
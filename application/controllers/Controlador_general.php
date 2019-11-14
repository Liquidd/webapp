<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Controlador_general extends CI_Controller {

    protected $name_user;
    protected $permisos;
    protected $estado_sesion;
    public function __construct(){
        parent::__construct();
        $this->load->library('session');

        if ($this->session->userdata('login_state') !== FALSE){
            $this->id_usuario = $this->session->userdata("datos_usuario")['id_usuario'];
            $this->name_user = $this->session->userdata("datos_usuario")['username'];
            $this->permisos = $this->session->userdata("datos_usuario")['permisos'];
            $this->estado_sesion = $this->session->userdata("login_state");

		}else{
            $this->load->view("login");
        }
    }

    public function view($view, $params = null){
        /**
         * @view parametro por donde llega la vista que se desea cargar dentro del layout
         * @param valores que se cargan en la vista (opcional iniciando como nulo)
         * @data['content'] arreglo que se mandara a llamar desde el contendor del layout
         * @data['id_usuario'] arreglo que almacenara el id del usuario logeado y que podra ser heredado
         * @data['username'] arreglo que almacenara el nombre del usuario logeado y que podra ser heredado
         * @data['permisos'] arreglo que almacenara el permiso del usuario logeado y que podra ser heredado
         * @data['titulo'] arreglo que almacenara el titulo de la vista y que podra ser heredado
         */


        $data = array();
        $params["username"] = $this->name_user;
        $params["permisos"] = $this->permisos;
        $params["titulo"] = "LUIS | ".$view;
        $data['content'] = $this->load->view('vistas/'.$view, $params, true);
        
        if ($view == "login") {
            $this->session->sess_destroy();
            $this->load->view('layout/main_layout',$data, false);
        }
        else {
            $this->load->view('layout/head',$data);
            $this->load->view('layout/nav');
            $this->load->view('layout/header');
            $this->load->view('layout/main_layout',$data, false);
            $this->load->view('layout/footer');
        }
    }
    function hola(){
        echo "hola X";
    }
    
}
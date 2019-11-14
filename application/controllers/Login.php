<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Login_m",'',TRUE);
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view("login");
    }
    public function validacion()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        $result = $this->Login_m->validacion($username,MD5($password));
        if($result !== FALSE){
            $this->session->set_userdata(["login_state"=>TRUE]);
            $this->session->set_userdata('datos_usuario',$result);
            echo TRUE;
        }else{
            $this->session->set_userdata(["login_state"=>FALSE]);
            echo FALSE;
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("login_m",'',TRUE);
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view("login");
    }
    public function validacion()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        $result = $this->login_m->validacion($username,MD5($password));
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
    public function about()
    {
        $this->load->view('about');
    }
    public function packages()
    {
        $this->load->view('packages');
    }
    public function blog()
    {
        $this->load->view('blog');
    }
    public function contact()
    {
        $this->load->view('contact');
    }
    public function home()
    {
        $this->load->view('home');
    }
}
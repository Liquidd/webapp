<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_m extends CI_Model{

    public function validacion($user,$psw)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('username', $user);   
        $this->db->where('password', $psw);   
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }

    
}
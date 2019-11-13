<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios_m extends CI_Model{

    public function lista_usuarios($id_usuario = null)
    {
        if ($id_usuario == null) {
            $this->db->select('id_usuario,username,password,permisos,estado');
            $this->db->from('usuarios');
            $query=$this->db->get();
            if ($query->num_rows() > 0){
                return $query->result_array();
            }else
            return FALSE;
        }
        else {
            $this->db->select('id_usuario,username,password,permisos,estado');
            $this->db->from('usuarios');
            $this->db->where('id_usuario',$id_usuario);
            $query=$this->db->get();
            if ($query->num_rows() > 0){
                return $query->result_array();
            }else
            return FALSE;
        }
    }
	// CRUD
	public function alta_usuario($username,$password,$permisos)
	{
        $data = array(
            'username' => $username,
            'password' => md5($password),
            'permisos' => $permisos,
            'estado' => 0
        );
    
        $result = $this->db->insert('usuarios',$data);
        if ($result) {
            return TRUE;
        }else
        return FALSE;
    }

    public function actualizar_usuario($username,$password,$permisos,$id_usuario)
	{        
        $data = array(
            'username' => $username,
            'password' => md5($password),
            'permisos' => $permisos,
        );
        $this->db->where('id_usuario',$id_usuario);
        $this->db->update('usuarios', $data);
        if ($result) {
            return TRUE;
        }else
        return FALSE;
    }

	public function estado_usuario($id_usuario,$estado)
	{
        if ($estado <= 0) {
            $estado = 1;
            $this->db->set('estado',$estado, FALSE);
            $this->db->where('id_usuario',$id_usuario);
            $this->db->update('usuarios');
            return "ACTIVED";
        }
        else {
            $estado = 0;
            $this->db->set('estado',$estado,FALSE);
            $this->db->where('id_usuario',$id_usuario);
            $this->db->update('usuarios');
            return "DELETE";
        }
    }

}
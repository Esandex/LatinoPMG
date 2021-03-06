<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Usuarios_model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function validar()
	{
		$data = array(	
						'username' 	=> $this->input->post('username'), 
						'password' 	=> $this->input->post('password')
					 );
		$ResultSet = $this->Usuarios_model->obtenerUsuario($data);
		if($ResultSet){
			$usuario_data = array(
               'id' => $ResultSet->user_id,
               'username' => $ResultSet->username,
               'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            echo "Bienvenido " . $ResultSet->username;
            redirect(base_url()."panel");
		}else{
			$this->session->set_flashdata('error', 'Combinacion errónea');
			redirect(base_url()."login");	
		}
	}
}

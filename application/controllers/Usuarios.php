<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logueado')){			
			redirect('login');
		}else{
			$this->load->model('Usuarios_model');	
			$this->load->model('Menus_model');	
			$this->load->model('Registro_model');	
		}
	}
	public function index()
	{
		$data = array();
		$data['username'] = $this->session->userdata('username');
		$data['menus_permitidos'] = $this->Usuarios_model->listar_menu_permitidos($this->session->userdata('id'));
		$data['users'] = $this->Usuarios_model->read_all();
		$this->load->view('template/inicio_panel', $data);
		$this->load->view('usuarios/listar');
		$this->load->view('template/fin_panel');
	}
	public function nuevo()
	{
		$data = array();
		$data['username'] = $this->session->userdata('username');
		$data['users'] = $this->Usuarios_model->read_all();
		$data['menus_permitidos'] = $this->Usuarios_model->listar_menu_permitidos($this->session->userdata('id'));
		$this->load->view('template/inicio_panel', $data);
		$this->load->view('usuarios/nuevo');
		$this->load->view('template/fin_panel');
	}
	public function enviar_invitacion()
	{
		$data = array(	
						'name' 		=> $this->input->post('name'),
						'email' 	=> $this->input->post('email'),
						'username'	=> $this->session->userdata('username')
					 );
		
		$this->Registro_model->insertar($data);
		redirect('usuarios');
	}
	public function permisos($id)
	{
		if ($id) {
			$data = array();
			$data['username'] 	= $this->session->userdata('username');
			$data['id_user'] 	= $this->session->userdata('id');
			$data['user'] 		= $this->Usuarios_model->read($id);
			$data['menus']		= $this->Usuarios_model->user_menu($id);
			$data['menus_permitidos'] = $this->Usuarios_model->listar_menu_permitidos($this->session->userdata('id'));
			$this->load->view('template/inicio_panel', $data);
			$this->load->view('usuarios/permisos');
			$this->load->view('template/fin_panel');
		}else{
			redirect('usuarios');
		}
	}
	public function permisoMenu($estado, $id_user, $id_menu){	
		if($estado == 'true'){
			$this->Usuarios_model->insertar_permiso_menu($id_user, $id_menu);
		}else{
			$this->Usuarios_model->eliminar_permiso_menu($id_user, $id_menu);
		}
		redirect('usuarios/permisos/'.$id_user);
	}	
}

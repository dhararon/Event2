<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//
		// Ejecutamos el chequeo de session
		//
		$this->is_login();
		$this->load->library('grocery_CRUD');

	}

	/**
	 * Pagina index para este controlador.
	 *
	 * Mapa para ver este archivo
	 * 		http://example.com/index.php/actividades
	 *	- o -  
	 * 		http://example.com/index.php/actividades/index
	 *
	 */

	public function index()
	{

		$direccion = 'edit/'.$this->session->userdata('usuarioID');
			$ruta = $this->uri->segment(3).'/'.$this->uri->segment(4);

			if( $ruta != $direccion ){	
				redirect( base_url().'index.php/usuario/index/edit/'.$this->session->userdata('usuarioID') );
			}


		$crud = new grocery_CRUD();
 
    	$crud->set_theme('flexigrid');
    	$crud->set_table('Usuarios');
    	$crud->set_subject('Usuario');

    	$crud->where('usuario_pk',$this->session->userdata('usuarioID') );

    	$crud->change_field_type('password','password');

    	$crud->unset_back_to_list();

    	$crud->display_as('nombreUsuario','Nombre');
    	$crud->display_as('apellidoPat','Apellido Paterno');
    	$crud->display_as('apellidoMat','Apellido Materno');

    	$crud->fields('nombreUsuario','apellidoPat','apellidoMat','imagen','password');

    	$crud->set_field_upload('imagen','assets/uploads/fotos');

    	$crud->callback_before_insert(array($this,'encrypt_password_callback'));
    	$crud->callback_before_update(array($this,'encrypt_password_callback'));
 
    	$output = $crud->render();
 		
    	$output->tipo = $this->session->userdata('tipo');
 		$output->tabla = True;

		$this->load->view('includes/head',$output);
		$this->load->view('usuario');
		$this->load->view('includes/footer');

			
	}
	
	/* Fin de la función index */

	/*
	*
	* Funcion que verifica si ha iniciado sesion
	*
	*/
	public function is_login(){

		//
		// Verificamos que haya una variable de sesion activa
		// y tenga privilegios
		//
		if( !$this->session->userdata('activo') ){
			redirect(base_url());
		}

	}

	/* Fin de la funcion is_login */

function encrypt_password_callback($post_array) {

  $post_array['password'] = $this->encrypt->sha1($post_array['password']);
 
  return $post_array;
}  

}

/* Fin del archivo dashboard.php */
/* Locación: ./application/controllers/dashboard.php */
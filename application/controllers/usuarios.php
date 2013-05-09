<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
	 * 		http://example.com/index.php/dashboard
	 *	- o -  
	 * 		http://example.com/index.php/dashboard/index
	 *
	 */

	public function index()
	{

		$crud = new grocery_CRUD();
 
    	$crud->set_theme('flexigrid');
    	$crud->set_table('Usuarios');
    	$crud->set_subject('Usuario');

    	$crud->columns('nombreUsuario','apellidoPat','apellidoMat','cuenta');

    	$crud->change_field_type('password','password');
    	$crud->change_field_type('semestre', 'enum', array('1','2','3','4','5','6','7','8','9','10'));

    	$crud->display_as('nombreUsuario','Nombre');
    	$crud->display_as('apellidoPat','Apellido Paterno');
    	$crud->display_as('apellidoMat','Apellido Materno');
    	$crud->display_as('cuenta','Numero de cuenta');
    	$crud->display_as('carrera_fk','Carrera');    	
    	$crud->display_as('tipo_fk','Tipo de usuario');    	


    	$crud->unset_add_fields('usuario_pk');

    	$crud->set_relation('carrera_fk','Carreras','nombreCarrera');
    	$crud->set_relation('tipo_fk','Tipos_Usuarios','nombreTipo');

    	$crud->callback_before_insert(array($this,'encrypt_password_callback'));
 
    	$output = $crud->render();
 		
    	$output->tipo = $this->session->userdata('tipo');
 		$output->tabla = True;

		$this->load->view('includes/head',$output);
		$this->load->view('usuarios');
		$this->load->view('includes/footer');

	}
	
	/* Fin de la función index */

	/*
	* Funcion que verifica si ha iniciado sesion
	*/
	public function is_login(){

		//
		// Verificamos que haya una variable de sesion activa
		// y tenga privilegios
		//
		if( !$this->session->userdata('activo') ){
			redirect(base_url());
		}
		else if( $this->session->userdata('tipo') != 'Administrador'){
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
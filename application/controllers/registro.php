<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//
		// Ejecutamos el chequeo de session
		//
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

		if( $this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'insert' || $this->uri->segment(3) == 'insert_validation'  ){	
				

		$crud = new grocery_CRUD();
 
    	$crud->set_theme('flexigrid');
    	$crud->set_table('Usuarios');
    	$crud->set_subject('Usuario');

    	$crud->change_field_type('password','password');
    	$crud->change_field_type('semestre', 'enum', array('1','2','3','4','5','6','7','8','9','10'));

    	$crud->unset_back_to_list();

    	$crud->display_as('nombreUsuario','Nombre');
    	$crud->display_as('apellidoPat','Apellido Paterno');
    	$crud->display_as('apellidoMat','Apellido Materno');
    	$crud->display_as('cuenta','Numero de cuenta');
    	$crud->display_as('carrera_fk','Carrera');

    	$crud->fields('nombreUsuario','apellidoPat','apellidoMat','cuenta','imagen','password','carrera_fk','semestre');
    	$crud->required_fields('nombreUsuario','apellidoPat','apellidoMat','cuenta','password','carrera_fk','semestre');

    	$crud->set_field_upload('imagen','assets/uploads/fotos');

    	$crud->set_relation('carrera_fk','Carreras','nombreCarrera');
 
    	$output = $crud->render();

		$this->load->view('registro',$output);

	}
	else{
		redirect( base_url().'index.php/registro/index/add');
			}
			

	}
	
	/* Fin de la función index */


}

/* Fin del archivo dashboard.php */
/* Locación: ./application/controllers/dashboard.php */
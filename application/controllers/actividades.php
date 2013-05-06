<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades extends CI_Controller {

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
    	$crud->set_table('Actividades');
    	$crud->set_subject('Actividad');

    	$crud->display_as('nombreActividades','Nombre de la actividad');
    	$crud->display_as('tipo','Tipo de actividad');
    	$crud->display_as('ponente_fk','Ponente');
    	$crud->display_as('aula_fk','Aula');
    	$crud->display_as('evento_fk','Evento');	

    	$crud->unset_add_fields('actividad_pk');

    	$crud->set_relation('ponente_fk','Ponentes','nombrePonente');
    	$crud->set_relation('aula_fk','Aulas','{Edificio} - {salon}');
    	$crud->set_relation('evento_fk','Eventos','nombreEvento');
 
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
		else if( !$this->session->userdata('tipo') == 'Administrador' || !$this->session->userdata('tipo') == 'Organizador' ){
			redirect(base_url());		
		}

	}

	/* Fin de la funcion is_login */


}

/* Fin del archivo dashboard.php */
/* Locación: ./application/controllers/dashboard.php */
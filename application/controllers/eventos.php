<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {

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
	 * 		http://example.com/index.php/dashboard
	 *	- o -  
	 * 		http://example.com/index.php/dashboard/index
	 *
	 */

	public function index()
	{

		$this->is_login();

		$crud = new grocery_CRUD();
 
    	$crud->set_theme('flexigrid');
    	$crud->set_table('Eventos');
    	$crud->set_subject('Evento');

    	$crud->display_as('nombreEvento','Evento');
    	$crud->display_as('fechaInicio','Fecha Inicio');  	
    	$crud->display_as('fechaTermino','Fecha Termino');  	

    	$crud->unset_add_fields('evento_pk');

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
		else if( $this->session->userdata('tipo') == 'Administrador' || $this->session->userdata('tipo') == 'Organizador' ){
					
		}
		else{
			redirect(base_url());
		}

	}

	/* Fin de la funcion is_login */

	/*
	* Funcion que muestra todas las actividades disponibles en un evento
	*/
	public function ver(){

		//
		// Verificamos que envie una pedicion para un evento
		//
		if( $this->uri->segment(3) ){

			//
			// Comprobamos que inicio sesion
			//
			if( !$this->session->userdata('activo') ){
				redirect(base_url());
			}

			$this->load->model('actividades');
			$actividades = $this->actividades->actividades();
			$eventos = $this->actividades->eventos();
			
			$eventos2['eventos'] = $eventos;
			$eventos2['contenido'] = $actividades;
			$eventos2['tipo'] = $this->session->userdata('tipo');
			$eventos2['tabla'] =  False;

			$this->load->view('includes/head',$eventos2);
			$this->load->view('actividades');
			$this->load->view('includes/footer');
			
		}
		else{
			redirect(base_url());
		}

	}


}

/* Fin del archivo dashboard.php */
/* Locación: ./application/controllers/dashboard.php */
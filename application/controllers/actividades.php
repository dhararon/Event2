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
	 * 		http://example.com/index.php/actividades
	 *	- o -  
	 * 		http://example.com/index.php/actividades/index
	 *
	 */

	public function index()
	{
		if( $this->session->userdata('tipo') != 'Administrador' && !$this->session->userdata('tipo') != 'Organizador' ){
			redirect(base_url());
		}
		else{

		$crud = new grocery_CRUD();
 
    	$crud->set_theme('flexigrid');
    	$crud->set_table('Actividades');
    	$crud->set_subject('Actividad');

    	$crud->fields('nombreActividades','tipo','ponente_fk','aula_fk','evento_fk','hora','fecha','descripcion','inscritos');

    	$crud->columns('nombreActividades','tipo','fecha','hora','aula_fk');

    	$crud->display_as('nombreActividades','Nombre de la actividad');
    	$crud->display_as('tipo','Tipo de actividad');
    	$crud->display_as('ponente_fk','Ponente');
    	$crud->display_as('aula_fk','Aula');
    	$crud->display_as('evento_fk','Evento');	

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

	/*
	*
	*	Funcion que da de alta un lugar en la base de datos para el evento
	*	Mapa para ver este archivo:
	* 		http://example.com/index.php/actividades/asistir
	*
	*/

	public function asistir(){

		if( $this->input->post('actividad') ){

			$this->load->model('asistencias');

			$respuesta = $this->asistencias->asistir();

			echo json_encode($respuesta);

		}
		else{

			redirect( base_url() );

		}


	}
	/* Fin de la funcion asistir */

	/*
	*
	*	Funcion que muestra todas mis actividades del usuario
	*	Mapa para ver este archivo:
	*		http://example.com/index.php/actividades/mis_act
	*
	*/

	public function mis_act(){

			$this->load->model('mis_actividades');
			$actividades['actividades'] = $this->mis_actividades->mis_actividades();

			$actividades['tipo'] = $this->session->userdata('tipo');
			$actividades['tabla'] = FALSE;

			$this->load->view('includes/head',$actividades);
			$this->load->view('mi_act');
			$this->load->view('includes/footer');

	}

}

/* Fin del archivo dashboard.php */
/* Locación: ./application/controllers/dashboard.php */
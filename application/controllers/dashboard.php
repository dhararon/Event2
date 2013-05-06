<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//
		// Ejecutamos el chequeo de session
		//
		$this->is_login();

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

		$data = $this->session->all_userdata();
		$data['tabla'] = False;

		//
		// Sacamos todos los eventos disponibles
		//
		$this->load->model('eventos');
		$eventos = $this->eventos->eventos();

		$this->load->view('includes/head',$data);
		$this->load->view('dashboard',$eventos);
		$this->load->view('includes/footer');

	}
	
	/* Fin de la función index */

	/*
	* Funcion que verifica si ha iniciado sesion
	*/
	public function is_login(){

		//
		// Verificamos que haya una variable de sesion activa
		//
		if( !$this->session->userdata('activo') ){
			redirect(base_url());
		}

	}

	/* Fin de la funcion is_login */


}

/* Fin del archivo dashboard.php */
/* Locación: ./application/controllers/dashboard.php */
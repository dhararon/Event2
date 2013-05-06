<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

	}

	/**
	 * Pagina index para este controlador.
	 *
	 * Mapa para ver este archivo
	 * 		http://example.com/index.php/login
	 *	- o -  
	 * 		http://example.com/index.php/login/index
	 *
	 */

	public function index()
	{

		if( $this->session->userdata('activo') ){
			redirect('/dashboard');
		}
		else{

			$data = array('error'=>False);
			$this->load->view('login',$data);
		
		}

	}
	
	/* Fin de la función index */

	/**
	 * Controlador de inicio de sesion
	 *
	 * Mapa para ver este archivo
	 * 		http://example.com/index.php/login/loguear
	 *
	 */

	public function loguear()
	{

		//
		// Cargamos el modelo en la clase maestra
		//
		$this->load->model('login_model');
       
        //
        // Ejecutamos la validación del usuario
        //
        $result = $this->login_model->validate();
        
        //
        // Si devuelve falso, renderizamos la pagina y mostramos el mensaje de error
        // Si devuelve verdadero, redireccionamos al dashboard
        //
        if(! $result){
            
            $data = array('error'=>True);
            $this->load->view('login',$data);



        }else{
            
            redirect('/dashboard','refresh');

        }     
	}

	/* Fin de la función login */

	/**
	 * Controlador de cierre de sesion
	 *
	 * Mapa para ver este archivo
	 * 		http://example.com/index.php/login/logout
	 *
	 */

	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url());

	}

	/* Fin de la funcion logout */

}

/* Fin del archivo login.php */
/* Locación: ./application/controllers/login.php */
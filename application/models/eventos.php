<?php 

class Eventos extends CI_Model{

    function __construct(){
        parent::__construct();
    }


    /*
     *
     * Modelo que muestra todos los eventos
     *
    */
    
    public function eventos(){

        $this->db->select('*');
        $this->db->from('Eventos');
        $query = $this->db->get();
        $row = $query->row();
        
        return $row;

    }

}

?>
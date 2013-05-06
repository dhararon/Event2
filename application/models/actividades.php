<?php 

class Actividades extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    /*
     *
     * Modelo que muestra todas las actividades de un evento
     *
    */

    public function actividades(){

        $even = $this->security->xss_clean($this->uri->segment(3));

        $this->db->select('*');
        $this->db->from('Actividades');
        $this->db->join('Ponentes','Ponentes.ponente_pk = Actividades.ponente_fk');
        $this->db->join('Aulas','Aulas.aula_pk = Actividades.aula_fk');
        $this->db->where('evento_fk',$even);
        $query = $this->db->get();
        $row = $query->result();

        return $row;

    }

    public function eventos(){

        $even = $this->security->xss_clean($this->uri->segment(3));

        $this->db->select('*');
        $this->db->from('Eventos');
        $this->db->where('evento_pk',$even);
        $query = $this->db->get();
        $row = $query->row();
        
        return $row;

    }

}

?>
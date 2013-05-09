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

        $even = $this->security->xss_clean( $this->uri->segment(3) );

        // trae todos lso que ya estan inscritos
        /*
        */
        $consulta = '
        SELECT Actividades.actividad_pk,Actividades.nombreActividades, Actividades.tipo,Actividades.fecha,Actividades.hora,Actividades.descripcion,Actividades.inscritos,Ponentes.nombrePonente,Aulas.edificio,Aulas.salon,Aulas.capacidad
        FROM Actividades
        JOIN Ponentes ON Ponentes.ponente_pk = Actividades.ponente_fk
        JOIN Aulas ON Aulas.aula_pk = Actividades.aula_fk
        WHERE evento_fk = '.$even.' AND NOT actividad_pk = ANY ( SELECT actividad_fk FROM Usuarios_Actividades WHERE usuario_fk = '.$this->session->userdata('usuarioID').' )';

        $query = $this->db->query($consulta);
        $row = $query->result();

        return $row;

    }

    public function eventos(){

        $even = $this->security->xss_clean( $this->uri->segment(3) );

        $this->db->select('*');
        $this->db->from('Eventos');
        $this->db->where('evento_pk',$even);
        $query = $this->db->get();
        $row = $query->row();
        
        return $row;

    }

    public function mis_actividades(){

        $consulta = '
            SELECT Actividades.fecha,Actividades.hora,Actividades.nombreActividades,Aulas.edificio,Aulas.salon
            FROM Actividades
            JOIN Aulas ON Aulas.aula_pk = Actividades.aula_fk 
            WHERE actividad_pk = ANY(SELECT actividad_fk FROM Usuarios_Actividades WHERE usuario_fk = '.$this->session->userdata('usuarioID').') 
            ORDER BY fecha,hora DESC
        ';

        $query = $this->db->query($consulta);
        $row = $query->result();

        return $row;

    }
    
}

?>
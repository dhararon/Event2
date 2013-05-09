<?php 

class Mis_actividades extends CI_Model{

    function __construct(){
        parent::__construct();
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
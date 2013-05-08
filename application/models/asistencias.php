<?php 

class Asistencias extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function asistir(){

        $actividad = $this->security->xss_clean( $this->input->post('actividad') );

        $this->db->select('*');
        $this->db->from('Usuarios_Actividades');
        $this->db->where('actividad_fk',$actividad);
        $this->db->where('usuario_fk',$this->session->userdata('usuarioID'));
        $query = $this->db->get();

        if( $query->num_rows == 0 ){

            $this->db->select('inscritos');
            $this->db->from('Actividades');
            $this->db->where('actividad_pk',$actividad);
            $query = $this->db->get();

            if( $query->num_rows == 1 ){

                $inscrito = $query->row();
                $inscritos = $inscrito->inscritos + 1;

                $data = array(
                        'inscritos' => $inscritos
                    );
                $this->db->where('actividad_pk',$actividad);
                $this->db->update('Actividades',$data);

                $this->db->set('usuario_fk',$this->session->userdata('usuarioID'));
                $this->db->set('actividad_fk',$actividad);
                $this->db->insert('Usuarios_Actividades');

                return 'TRUE';

                    }
            else{

                return 'FALSE';

            }

        }
        else{

            return 'FALSE';

        }

    }
}

?>
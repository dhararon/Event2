<?php 

class Login_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }


    /*
     *
     * Modelo que valida el usuario y contraseña
     *
    */
    
    public function validate(){

        //
        // Limpiamos los campos input de SQLi y XSS
        //
        $username = $this->security->xss_clean($this->input->post('usuario'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        //
        // Creamos el SQL
        //
        $this->db->select('*');
        $this->db->from('Usuarios');
        $this->db->join('Carreras','Carreras.carrera_pk = Usuarios.carrera_fk');
        $this->db->join('Tipos_Usuarios','Tipos_Usuarios.tipoUsuario_pk = Usuarios.tipo_fk');
        $this->db->where('cuenta',$username);
        $this->db->where('password',$password);
        $query = $this->db->get();

        //
        // Verificamos que solo se devuelva un registro, por lo tanto no habran mas de un usuario para prevenir el SQLi
        // Creamos un arreglo con la informacion del usuario y la guardamos en una variable de sesion
        //
        if( $query->num_rows == 1 )
        {

            $row = $query->row();
            $data = array(

                    'nombreUsuario' => $row->nombreUsuario,
                    'apellidoPat' => $row->apellidoPat,
                    'apellidoMat' => $row->apellidoMat,
                    'tipo' => $row->nombreTipo,
                    'semestre' => $row->semestre,
                    'carrera' => $row->nombreCarrera,
                    'activo' => True
                
                    );

            $this->session->set_userdata($data);
            
            return true;
        }

        return false;
    }


}

?>
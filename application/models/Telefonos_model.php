<?php
class Telefonos_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_telefonos($id = FALSE, $telefono_id = FALSE)
		{
	        if ($id === FALSE and $telefono_id === FALSE)
	        {
	                $query = $this->db->get('telefonos');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('telefonos', array('id' => $id, 'telefono_id' => $telefono_id));
	        return $query->row_array();
		}      

		public function set_telefonos()
        {
            $data = array(
                'telefono_id' => $this->input->post('telefono_id'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'numero' => $this->input->post('numero'),
            );
            return $this->db->insert('telefonos', $data);
        }


        public function modify_telefonos($id,$telefono_id)
        {
            $data = array(
                'telefono_id' => $this->input->post('telefono_id'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'numero' => $this->input->post('numero'),
            );
            $this->db->where('id', $id);
            //$this->db->where('telefono_id', $telefono_id);
            return $this->db->update('telefonos', $data);
        } 

        public function delete_telefonos($id,$telefono_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('telefono_id', $telefono_id);
            return $this->db->delete('telefonos');
        } 

}
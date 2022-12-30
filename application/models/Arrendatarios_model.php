<?php
class Arrendatarios_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_arrendatarios($id = FALSE, $arrendatario_id = FALSE)
		{
	        if ($id === FALSE and $arrendatario_id === FALSE)
	        {
	                $query = $this->db->get('arrendatarios');
	                return $query->result_array();
	        }
	        $query = $this->db->get_where('arrendatarios', array('id' => $id, 'arrendatario_id' => $arrendatario_id));
	        return $query->row_array();
		}      

		public function set_arrendatarios()
        {
            $data = array(
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'inmueble_id' => $this->input->post('inmueble_id'),
                'nombres' => $this->input->post('nombres'),
                'paterno' => $this->input->post('paterno'),
                'materno' => $this->input->post('materno'),
                'dni' => $this->input->post('dni')
            );
            return $this->db->insert('arrendatarios', $data);
        }


        public function modify_arrendatarios($id,$arrendatario_id)
        {
            $data = array(
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'inmueble_id' => $this->input->post('inmueble_id'),
                'nombres' => $this->input->post('nombres'),
                'paterno' => $this->input->post('paterno'),
                'materno' => $this->input->post('materno'),
                'dni' => $this->input->post('dni')
            );
            $this->db->where('id', $id);
            //$this->db->where('arrendatario_id', $arrendatario_id);
            return $this->db->update('arrendatarios', $data);
        } 

        public function delete_arrendatarios($id,$arrendatario_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('arrendatario_id', $arrendatario_id);
            return $this->db->delete('arrendatarios');
        } 

}
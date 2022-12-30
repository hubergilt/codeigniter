<?php
class Familiares_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_familiares($id = FALSE, $familiar_id = FALSE)
		{
	        if ($id === FALSE and $familiar_id === FALSE)
	        {
	                $query = $this->db->get('familiares');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('familiares', array('id' => $id, 'familiar_id' => $familiar_id));
	        return $query->row_array();
		}      

		public function set_familiares()
        {
            $data = array(
                'familiar_id' => $this->input->post('familiar_id'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'tipoFamiliar_id' => $this->input->post('tipoFamiliar_id'),
                'nombres' => $this->input->post('nombres'),
                'paterno' => $this->input->post('paterno'),
                'materno' => $this->input->post('materno'),                
            );
            return $this->db->insert('familiares', $data);
        }


        public function modify_familiares($id,$familiar_id)
        {
            $data = array(
                'familiar_id' => $this->input->post('familiar_id'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'tipoFamiliar_id' => $this->input->post('tipoFamiliar_id'),
                'nombres' => $this->input->post('nombres'),
                'paterno' => $this->input->post('paterno'),
                'materno' => $this->input->post('materno'),                
            );
            $this->db->where('id', $id);
            //$this->db->where('familiar_id', $familiar_id);
            return $this->db->update('familiares', $data);
        } 

        public function delete_familiares($id,$familiar_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('familiar_id', $familiar_id);
            return $this->db->delete('familiares');
        } 

}
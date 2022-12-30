<?php
class TipoFamiliares_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_tipoFamiliares($id = FALSE, $tipoFamiliar_id = FALSE)
		{
	        if ($id === FALSE and $tipoFamiliar_id === FALSE)
	        {
	           $query = $this->db->get('tipofamiliares');
	            return $query->result_array();
	        }

	        $query = $this->db->get_where('tipofamiliares', array('id' => $id, 'tipoFamiliar_id' => $tipoFamiliar_id));
	        return $query->row_array();
		}      

		public function set_tipoFamiliares()
        {
            $data = array(
                'tipoFamiliar_id' => $this->input->post('tipoFamiliar_id'),
                'nombre' => $this->input->post('nombre')
            );
            return $this->db->insert('tipofamiliares', $data);
        }


        public function modify_tipoFamiliares($id,$tipoFamiliar_id)
        {
            $data = array(
                'tipoFamiliar_id' => $this->input->post('tipoFamiliar_id'),
                'nombre' => $this->input->post('nombre')
            );
            $this->db->where('id', $id);
            //$this->db->where('tipoFamiliar_id', $tipoFamiliar_id);
            return $this->db->update('tipofamiliares', $data);
        } 

        public function delete_tipoFamiliares($id,$tipoFamiliar_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('tipoFamiliar_id', $tipoFamiliar_id);
            return $this->db->delete('tipofamiliares');
        } 

}
<?php
class TipoAmbientes_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_tipoAmbientes($id = FALSE, $tipoAmbiente_id = FALSE)
		{
	        if ($id === FALSE and $tipoAmbiente_id === FALSE)
	        {
	                $query = $this->db->get('tipoambientes');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('tipoambientes', array('id' => $id, 'tipoAmbiente_id' => $tipoAmbiente_id));
	        return $query->row_array();
		}      

		public function set_tipoAmbientes()
        {
            $data = array(
                'tipoAmbiente_id' => $this->input->post('tipoAmbiente_id'),
                'nombre' => $this->input->post('nombre'),
                'acabado' => $this->input->post('acabado')
            );
            return $this->db->insert('tipoambientes', $data);
        }


        public function modify_tipoAmbientes($id,$tipoAmbiente_id)
        {
            $data = array(
                'tipoAmbiente_id' => $this->input->post('tipoAmbiente_id'),
                'nombre' => $this->input->post('nombre'),
                'acabado' => $this->input->post('acabado')
            );
            $this->db->where('id', $id);
            //$this->db->where('tipoAmbiente_id', $tipoAmbiente_id);
            return $this->db->update('tipoambientes', $data);
        } 

        public function delete_tipoAmbientes($id,$tipoAmbiente_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('tipoAmbiente_id', $tipoAmbiente_id);
            return $this->db->delete('tipoambientes');
        } 

}
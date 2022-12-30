<?php
class TipoDepositos_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_tipoDepositos($id = FALSE, $tipoDeposito_id = FALSE)
		{
	        if ($id === FALSE and $tipoDeposito_id === FALSE)
	        {
	           $query = $this->db->get('tipodepositos');
	            return $query->result_array();
	        }

	        $query = $this->db->get_where('tipodepositos', array('id' => $id, 'tipoDeposito_id' => $tipoDeposito_id));
	        return $query->row_array();
		}      

		public function set_tipoDepositos()
        {
            $data = array(
                'tipoDeposito_id' => $this->input->post('tipoDeposito_id'),
                'nombre' => $this->input->post('nombre')
            );
            return $this->db->insert('tipodepositos', $data);
        }


        public function modify_tipoDepositos($id,$tipoDeposito_id)
        {
            $data = array(
                'tipoDeposito_id' => $this->input->post('tipoDeposito_id'),
                'nombre' => $this->input->post('nombre')
            );
            $this->db->where('id', $id);
            //$this->db->where('tipoDeposito_id', $tipoDeposito_id);
            return $this->db->update('tipodepositos', $data);
        } 

        public function delete_tipoDepositos($id,$tipoDeposito_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('tipoDeposito_id', $tipoDeposito_id);
            return $this->db->delete('tipodepositos');
        } 

}
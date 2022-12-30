<?php
class Ambientes_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_ambientes($id = FALSE, $ambiente_id = FALSE)
		{
	        if ($id === FALSE and $ambiente_id === FALSE)
	        {
	                $query = $this->db->get('ambientes');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('ambientes', array('id' => $id, 'ambiente_id' => $ambiente_id));
	        return $query->row_array();
		}      

		public function set_ambientes()
        {
            $data = array(
                'ambiente_id' => $this->input->post('ambiente_id'),
                'nombre' => $this->input->post('nombre'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'tipoAmbiente_id' => $this->input->post('tipoAmbiente_id'),
                'inmueble_id' => $this->input->post('inmueble_id'),
                'piso' => $this->input->post('piso'),
                'ocupado' => $this->input->post('ocupado'),
                'precio' => $this->input->post('precio'),
                'fechaInicio' => $this->input->post('fechaInicio'),
                'fechaVencimiento' => $this->input->post('fechaVencimiento'),
                'garantia' => $this->input->post('garantia')
            );
            return $this->db->insert('ambientes', $data);
        }


        public function modify_ambientes($id,$ambiente_id)
        {
            $data = array(
                'ambiente_id' => $this->input->post('ambiente_id'),
                'nombre' => $this->input->post('nombre'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'tipoAmbiente_id' => $this->input->post('tipoAmbiente_id'),
                'inmueble_id' => $this->input->post('inmueble_id'),
                'piso' => $this->input->post('piso'),
                'ocupado' => $this->input->post('ocupado'),
                'precio' => $this->input->post('precio'),
                'fechaInicio' => $this->input->post('fechaInicio'),
                'fechaVencimiento' => $this->input->post('fechaVencimiento'),
                'garantia' => $this->input->post('garantia')
            );
            $this->db->where('id', $id);
            //$this->db->where('ambiente_id', $ambiente_id);
            return $this->db->update('ambientes', $data);
        } 

        public function delete_ambientes($id,$ambiente_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('ambiente_id', $ambiente_id);
            return $this->db->delete('ambientes');
        } 

}
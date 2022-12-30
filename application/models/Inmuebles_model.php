<?php
class Inmuebles_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_inmuebles($id = FALSE, $inmueble_id = FALSE)
		{
	        if ($id === FALSE and $inmueble_id === FALSE)
	        {
	                $query = $this->db->get('inmuebles');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('inmuebles', array('id' => $id, 'inmueble_id' => $inmueble_id));
	        return $query->row_array();
		}      

		public function set_inmuebles()
        {
            $data = array(
                'inmueble_id' => $this->input->post('inmueble_id'),
                'nombre' => $this->input->post('nombre'),
                'pisos' => $this->input->post('pisos'),
                'direccion' => $this->input->post('direccion'),
                'distrito' => $this->input->post('distrito'),
                'provincia' => $this->input->post('provincia'),
                'departamento' => $this->input->post('departamento')
            );
            return $this->db->insert('inmuebles', $data);
        }


        public function modify_inmuebles($id, $inmueble_id)
        {
            $data = array(
                'inmueble_id' => $this->input->post('inmueble_id'),
                'nombre' => $this->input->post('nombre'),
                'pisos' => $this->input->post('pisos'),
                'direccion' => $this->input->post('direccion'),
                'distrito' => $this->input->post('distrito'),
                'provincia' => $this->input->post('provincia'),
                'departamento' => $this->input->post('departamento')
            );
            $this->db->where('id', $id);
            //$this->db->where('inmuebles_id', $inmuebles_id);
            return $this->db->update('inmuebles', $data);
        } 

        public function delete_inmuebles($id, $inmueble_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('inmueble_id', $inmueble_id);
            return $this->db->delete('inmuebles');
        } 

}
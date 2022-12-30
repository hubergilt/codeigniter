<?php
class Depositos_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_depositos($id = FALSE, $deposito_id = FALSE, $anio = FALSE, $mes = FALSE, $ambiente_id = FALSE, $arrendatario_id = FALSE)
		{
            if ($id !== FALSE and $deposito_id !== FALSE) {
                    $query = $this->db->get_where('depositos', array('id' => $id, 'deposito_id' => $deposito_id));
                    return $query->row_array();
            } elseif ($anio !== FALSE and $mes !== FALSE and $ambiente_id === FALSE and $arrendatario_id === FALSE) {
	               $query = $this->db->get_where('depositos', array('anio' => $anio, 'mes' => $mes));
	               return $query->result_array();
            } elseif ($anio !== FALSE and $mes !== FALSE and $ambiente_id !== FALSE and $arrendatario_id === FALSE) {
                    $query = $this->db->get_where('depositos', array('ambiente_id' => $ambiente_id, 'anio' => $anio, 'mes' => $mes));
                    return $query->result_array();
            } elseif ($anio !== FALSE and $mes !== FALSE and $arrendatario_id !== FALSE and $ambiente_id === FALSE) {
                    $query = $this->db->get_where('depositos', array('arrendatario_id' => $arrendatario_id, 'anio' => $anio, 'mes' => $mes));
                    return $query->result_array();
            } else {
                    $query = $this->db->get('depositos');
                    return $query->result_array();
            }
		}      

		public function set_depositos()
        {
            $data = array(
                'deposito_id' => $this->input->post('deposito_id'),
                'ambiente_id' => $this->input->post('ambiente_id'),
                'tipoDeposito_id' => $this->input->post('tipoDeposito_id'),
                'monto' => $this->input->post('monto'),
                'anio' => $this->input->post('anio'),
                'mes' => $this->input->post('mes'),
                'fechaDeposito' => $this->input->post('fechaDeposito'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'observacion' => $this->input->post('observacion')
            );
            return $this->db->insert('depositos', $data);
        }


        public function modify_depositos($id,$deposito_id)
        {
            $data = array(
                'deposito_id' => $this->input->post('deposito_id'),
                'ambiente_id' => $this->input->post('ambiente_id'),
                'tipoDeposito_id' => $this->input->post('tipoDeposito_id'),
                'monto' => $this->input->post('monto'),
                'anio' => $this->input->post('anio'),
                'mes' => $this->input->post('mes'),
                'fechaDeposito' => $this->input->post('fechaDeposito'),
                'arrendatario_id' => $this->input->post('arrendatario_id'),
                'observacion' => $this->input->post('observacion')
            );
            $this->db->where('id', $id);
            //$this->db->where('deposito_id', $deposito_id);
            return $this->db->update('depositos', $data);
        } 

        public function delete_depositos($id,$deposito_id)
        {          
            $this->db->where('id', $id);
            //$this->db->where('deposito_id', $deposito_id);
            return $this->db->delete('depositos');
        } 

}
<?php
require_once 'Entidades.php';
class Design extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('depositos_model');
            $this->load->model('depositos_model');
            $this->load->model('tipoDepositos_model');
            $this->load->model('tipoAmbientes_model');
            $this->load->model('ambientes_model');
            $this->load->model('arrendatarios_model');
        }

        public function index()
        {            
            
            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

            $data['depositos'] = $this->depositos_model->get_depositos();            

            $ambientes = array();
            foreach ($this->ambientes_model->get_ambientes() as $ambientes_item) {
                $ambientes[$ambientes_item['ambiente_id']]=$ambientes_item  ;
            }
            $data['ambientes'] = $ambientes;

            $tipoAmbientes = array();
            foreach ($this->tipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item  ;
            }
            $data['tipoAmbientes'] = $tipoAmbientes;            

            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $tipoDepositos = array();
            foreach ($this->tipoDepositos_model->get_tipoDepositos() as $tipoDepositos_item) {
                $tipoDepositos[$tipoDepositos_item['tipoDeposito_id']]=$tipoDepositos_item;
            }
            $data['tipoDepositos'] = $tipoDepositos; 

            $this->load->view('design', $data);
        }

}
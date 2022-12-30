<?php
require_once 'Entidades.php';
class Ambientes extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Ambientes_model');
            $this->load->model('TipoAmbientes_model');   
            $this->load->model('Inmuebles_model');   
            $this->load->model('Arrendatarios_model');            
        }
        public function index()
        {            
            $data['ambientes'] = $this->Ambientes_model->get_ambientes();

            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

            $tipoAmbientes = array();
            foreach ($this->TipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item;
            }
            $data['tipoAmbientes'] = $tipoAmbientes;

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/menubar', $data);
            $this->load->view('templates/leftbar', $data);          
            $this->load->view('pages/'.strtolower(get_class($this)).'/list', $data);
            $this->load->view('templates/footer', $data);            
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');        

            $data['home_title'] = 'Crear '.get_class($this);
            $data['menuitem'] = get_class($this);

            $ambientes = array();
            foreach ($this->Ambientes_model->get_ambientes() as $ambientes_item) {
                array_push($ambientes, $ambientes_item['ambiente_id']);
            }

            $new_ambiente_id="";
            if(count($ambientes)>0){
                $new_ambiente_id = 'AMB'.sprintf('%03d', substr(max($ambientes),-3)+1);
            }else {
                $new_ambiente_id = 'AMB001';
            }            
            $data['new_ambiente_id'] = $new_ambiente_id;            

            $tipoAmbientes = array();
            foreach ($this->TipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item;
            }
            $data['tipoAmbientes'] = $tipoAmbientes;

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;            

            $this->form_validation->set_rules('ambiente_id', 'Ambiente_id', 'required');
            // $this->form_validation->set_rules('nombre', 'Nombre', 'required');            
            $this->form_validation->set_rules('tipoAmbiente_id', 'TipoAmbiente_id', 'required');
            $this->form_validation->set_rules('inmueble_id', 'Inmueble_id', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'Arrendatario_id', 'required');
            $this->form_validation->set_rules('piso', 'Piso', 'required');
            $this->form_validation->set_rules('ocupado', 'Ocupado', 'required');
            $this->form_validation->set_rules('precio', 'Precio', 'required');
            $this->form_validation->set_rules('fechaInicio', 'FechaInicio', 'required');
            $this->form_validation->set_rules('fechaVencimiento', 'FechaVencimiento', 'required');
            $this->form_validation->set_rules('garantia', 'Garantia', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('templates/menubar');
                $this->load->view('templates/leftbar', $data);
                $this->load->view('pages/'.strtolower(get_class($this)).'/create',$data);
                $this->load->view('templates/footer');            
            }
            else
            {                
                $this->Ambientes_model->set_ambientes();
                redirect('ambientes');
            }

        }

        public function modify($id = NULL, $ambiente_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$ambiente_id;
            $data['menuitem'] = get_class($this);

            $tipoAmbientes = array();
            foreach ($this->TipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item["tipoAmbiente_id"]]=$tipoAmbientes_item;
            }
            $data['tipoAmbientes'] = $tipoAmbientes; 

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item["arrendatario_id"]]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;

            $this->form_validation->set_rules('ambiente_id', 'Ambiente_id', 'required');
            // $this->form_validation->set_rules('nombre', 'Nombre', 'required');            
            $this->form_validation->set_rules('tipoAmbiente_id', 'TipoAmbiente_id', 'required');
            $this->form_validation->set_rules('inmueble_id', 'Inmueble_id', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'Arrendatario_id', 'required');
            $this->form_validation->set_rules('piso', 'Piso', 'required');
            $this->form_validation->set_rules('ocupado', 'Ocupado', 'required');
            $this->form_validation->set_rules('precio', 'Precio', 'required');
            $this->form_validation->set_rules('fechaInicio', 'FechaInicio', 'required');
            $this->form_validation->set_rules('fechaVencimiento', 'FechaVencimiento', 'required');
            $this->form_validation->set_rules('garantia', 'Garantia', 'required');

            $data['ambientes_item'] = $this->Ambientes_model->get_ambientes($id, $ambiente_id);

            if (empty($data['ambientes_item']))
            {
                    show_404();
                    return;
            }

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('templates/menubar');
                $this->load->view('templates/leftbar', $data);
                $this->load->view('pages/'.strtolower(get_class($this)).'/modify', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->Ambientes_model->modify_ambientes($id, $ambiente_id);
                redirect('ambientes');
            }
        }

        public function delete($id = NULL, $ambiente_id = NULL){            
            $this->Ambientes_model->delete_ambientes($id, $ambiente_id);
            redirect('ambientes');              
        }
}
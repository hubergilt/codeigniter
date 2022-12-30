<?php
require_once 'Entidades.php';
class Depositos extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Depositos_model');
            $this->load->model('TipoDepositos_model');
            $this->load->model('TipoAmbientes_model');
            $this->load->model('Ambientes_model');
            $this->load->model('Arrendatarios_model');
            $this->load->model('Inmuebles_model');
        }

        public function index($anio = NULL, $mes = NULL, $ambiente_id = NULL, $arrendatario_id = NULL)
        {            
            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

            $default = array('anio', 'mes', 'ambiente_id', 'arrendatario_id');
            $array = $this->uri->uri_to_assoc(3, $default);

            $anio = $array["anio"];
            $mes = $array["mes"];
            $ambiente_id = $array["ambiente_id"];
            $arrendatario_id = $array["arrendatario_id"];

            if($mes!==NULL and $anio!==NULL and $ambiente_id===NULL and $arrendatario_id===NULL){
                $data['depositos'] = $this->Depositos_model->get_depositos(FALSE, FALSE, $anio, $mes, FALSE, FALSE);
            }elseif($mes!==NULL and $anio!==NULL and $ambiente_id!==NULL and $arrendatario_id===NULL){
                $data['depositos'] = $this->Depositos_model->get_depositos(FALSE, FALSE, $anio, $mes, $ambiente_id, FALSE);
            }elseif($mes!==NULL and $anio!==NULL and $ambiente_id===NULL and $arrendatario_id!==NULL){
                $data['depositos'] = $this->Depositos_model->get_depositos(FALSE, FALSE, $anio, $mes, FALSE, $arrendatario_id);
            }else{
                $data['depositos'] = $this->Depositos_model->get_depositos();
            }

            $ambientes = array();
            foreach ($this->Ambientes_model->get_ambientes() as $ambientes_item) {
                $ambientes[$ambientes_item['ambiente_id']]=$ambientes_item  ;
            }
            $data['ambientes'] = $ambientes;

            $tipoAmbientes = array();
            foreach ($this->TipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item  ;
            }
            $data['tipoAmbientes'] = $tipoAmbientes;            

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $tipoDepositos = array();
            foreach ($this->TipoDepositos_model->get_tipoDepositos() as $tipoDepositos_item) {
                $tipoDepositos[$tipoDepositos_item['tipoDeposito_id']]=$tipoDepositos_item;
            }
            $data['tipoDepositos'] = $tipoDepositos; 

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

            $depositos = array();
            foreach ($this->Depositos_model->get_depositos() as $depositos_item) {
                array_push($depositos, $depositos_item['deposito_id']);
            }

            $new_deposito_id='';
            if(count($depositos)>0){
                $new_deposito_id = 'DEP'.sprintf('%03d', substr(max($depositos),-3)+1);
            }else {
                $new_deposito_id = 'DEP001';
            }
            $data['new_deposito_id'] = $new_deposito_id;    

            $ambientes = array();
            foreach ($this->Ambientes_model->get_ambientes() as $ambientes_item) {
                $ambientes[$ambientes_item['ambiente_id']]=$ambientes_item  ;
            }
            $data['ambientes'] = $ambientes;

            $tipoAmbientes = array();
            foreach ($this->TipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item  ;
            }
            $data['tipoAmbientes'] = $tipoAmbientes;            

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios; 

            $depositos = array();
            foreach ($this->Depositos_model->get_depositos() as $depositos_item) {
                $depositos[$depositos_item['ambiente_id']]=$depositos_item;
            }
            $data['depositos'] = $depositos;

            $tipoDepositos = array();
            foreach ($this->TipoDepositos_model->get_tipoDepositos() as $tipoDepositos_item) {
                $tipoDepositos[$tipoDepositos_item['tipoDeposito_id']]=$tipoDepositos_item;
            }
            $data['tipoDepositos'] = $tipoDepositos;

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;            

            $this->form_validation->set_rules('deposito_id', 'Deposito_id', 'required');
            $this->form_validation->set_rules('ambiente_id', 'Ambiente_id', 'required');
            $this->form_validation->set_rules('tipoDeposito_id', 'TipoDeposito_id', 'required');
            $this->form_validation->set_rules('monto', 'Monto', 'required');
            $this->form_validation->set_rules('anio', 'Anio', 'required');
            $this->form_validation->set_rules('mes', 'Mes', 'required');            
            $this->form_validation->set_rules('fechaDeposito', 'FechaDeposito', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'Arrendatario_id', 'required');


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
                $this->Depositos_model->set_depositos();
                redirect('depositos');
            }

        }

        public function modify($id = NULL, $deposito_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$deposito_id;
            $data['menuitem'] = get_class($this);

            $ambientes = array();
            foreach ($this->Ambientes_model->get_ambientes() as $ambientes_item) {
                $ambientes[$ambientes_item['ambiente_id']]=$ambientes_item  ;
            }
            $data['ambientes'] = $ambientes;

            $tipoAmbientes = array();
            foreach ($this->TipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                $tipoAmbientes[$tipoAmbientes_item['tipoAmbiente_id']]=$tipoAmbientes_item  ;
            }
            $data['tipoAmbientes'] = $tipoAmbientes;            

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios; 

            $depositos = array();
            foreach ($this->Depositos_model->get_depositos() as $depositos_item) {
                $depositos[$depositos_item['ambiente_id']]=$depositos_item;
            }
            $data['depositos'] = $depositos;

            $tipoDepositos = array();
            foreach ($this->TipoDepositos_model->get_tipoDepositos() as $tipoDepositos_item) {
                $tipoDepositos[$tipoDepositos_item['tipoDeposito_id']]=$tipoDepositos_item;
            }
            $data['tipoDepositos'] = $tipoDepositos;

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;            

            $this->form_validation->set_rules('deposito_id', 'Deposito_id', 'required');
            $this->form_validation->set_rules('ambiente_id', 'Ambiente_id', 'required');
            $this->form_validation->set_rules('tipoDeposito_id', 'TipoDeposito_id', 'required');
            $this->form_validation->set_rules('monto', 'Monto', 'required');
            $this->form_validation->set_rules('anio', 'Anio', 'required');
            $this->form_validation->set_rules('mes', 'Mes', 'required');            
            $this->form_validation->set_rules('fechaDeposito', 'FechaDeposito', 'required');   
            $this->form_validation->set_rules('arrendatario_id', 'Arrendatario', 'required');

            $data['depositos_item'] = $this->Depositos_model->get_depositos($id, $deposito_id);

            if (empty($data['depositos_item']))
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
                $this->Depositos_model->modify_depositos($id, $deposito_id);
                redirect('depositos');
            }
        }

        public function delete($id = NULL, $deposito_id = NULL){            
            $this->Depositos_model->delete_depositos($id, $deposito_id);
            redirect('depositos');         
        }
}
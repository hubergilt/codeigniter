<?php
require_once 'Entidades.php';
class Arrendatarios extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Arrendatarios_model');
            $this->load->model('Inmuebles_model');
        }

        public function index()
        {            
            $data['arrendatarios'] = $this->Arrendatarios_model->get_arrendatarios();            
            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

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

            $arrendatarios = array();
            foreach ($this->Arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                array_push($arrendatarios, $arrendatarios_item['arrendatario_id']);
            }

            $new_arrendatario_id='';
            if(count($arrendatarios)>0){
                $new_arrendatario_id = 'ARR'.sprintf('%03d', substr(max($arrendatarios),-3)+1);
            }else {
                $new_arrendatario_id = 'ARR001';
            }
            $data['new_arrendatario_id'] = $new_arrendatario_id;            

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;

            $this->form_validation->set_rules('arrendatario_id', 'Arredatario_id', 'required');
            $this->form_validation->set_rules('nombres', 'Nombres', 'required');
            $this->form_validation->set_rules('paterno', 'Paterno', 'required');
            $this->form_validation->set_rules('materno', 'Materno', 'required');
            $this->form_validation->set_rules('dni', 'Dni', 'required');            

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
                $this->Arrendatarios_model->set_arrendatarios();
                redirect('arrendatarios');
            }

        }

        public function modify($id = NULL, $arrendatario_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$arrendatario_id;
            $data['menuitem'] = get_class($this);

            $inmuebles = array();
            foreach ($this->Inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item['inmueble_id']]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;

            $this->form_validation->set_rules('arrendatario_id', 'Arredatario_id', 'required');
            $this->form_validation->set_rules('nombres', 'Nombres', 'required');
            $this->form_validation->set_rules('paterno', 'Paterno', 'required');
            $this->form_validation->set_rules('materno', 'Materno', 'required');
            $this->form_validation->set_rules('dni', 'Dni', 'required');  

            $data['arrendatarios_item'] = $this->Arrendatarios_model->get_arrendatarios($id, $arrendatario_id);

            if (empty($data['arrendatarios_item']))
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
                $this->Arrendatarios_model->modify_arrendatarios($id, $arrendatario_id);
                redirect('arrendatarios');
            }
        }

        public function delete($id = NULL, $arrendatario_id = NULL){            
            $this->Arrendatarios_model->delete_arrendatarios($id, $arrendatario_id);
            redirect('arrendatarios');              
        }
}
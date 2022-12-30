<?php
require_once 'Entidades.php';
class Familiares extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('familiares_model');
            $this->load->model('arrendatarios_model');
            $this->load->model('familiares_model');
            $this->load->model('tipoFamiliares_model');
        }

        public function index()
        {            
            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);            

            $data['familiares'] = $this->familiares_model->get_familiares();            

            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $tipoFamiliares = array();
            foreach ($this->tipoFamiliares_model->get_tipoFamiliares() as $tipoFamiliares_item) {
                $tipoFamiliares[$tipoFamiliares_item['tipoFamiliar_id']]=$tipoFamiliares_item;
            }
            $data['tipoFamiliares'] = $tipoFamiliares;            

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

            $familiares = array();
            foreach ($this->familiares_model->get_familiares() as $familiares_item) {
                array_push($familiares, $familiares_item['familiar_id']);
            }

            $new_familiar_id='';
            if(count($familiares)>0){
                $new_familiar_id = 'FAM'.sprintf('%03d', substr(max($familiares),-3)+1);
            }else {
                $new_familiar_id = 'FAM001';
            }
            $data['new_familiar_id'] = $new_familiar_id;           

            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $tipoFamiliares = array();
            foreach ($this->tipoFamiliares_model->get_tipoFamiliares() as $tipoFamiliares_item) {
                $tipoFamiliares[$tipoFamiliares_item['tipoFamiliar_id']]=$tipoFamiliares_item;
            }
            $data['tipoFamiliares'] = $tipoFamiliares; 

            $this->form_validation->set_rules('familiar_id', 'Familiar_id', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'arrendatario_id', 'required');
            $this->form_validation->set_rules('nombres', 'nombres', 'required');
            $this->form_validation->set_rules('paterno', 'Paterno', 'required');
            $this->form_validation->set_rules('materno', 'Materno', 'required');
            $this->form_validation->set_rules('tipoFamiliar_id', 'tipoFamiliar_id', 'required');       

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
                $this->familiares_model->set_familiares();
                redirect('familiares');
            }

        }

        public function modify($id = NULL, $arrendatario_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$arrendatario_id;
            $data['menuitem'] = get_class($this);


            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item['arrendatario_id']]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;

            $tipoFamiliares = array();
            foreach ($this->tipoFamiliares_model->get_tipoFamiliares() as $tipoFamiliares_item) {
                $tipoFamiliares[$tipoFamiliares_item['tipoFamiliar_id']]=$tipoFamiliares_item;
            }
            $data['tipoFamiliares'] = $tipoFamiliares;             

            $this->form_validation->set_rules('familiar_id', 'Familiar_id', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'arrendatario_id', 'required');
            $this->form_validation->set_rules('nombres', 'nombres', 'required');
            $this->form_validation->set_rules('paterno', 'Paterno', 'required');
            $this->form_validation->set_rules('materno', 'Materno', 'required');            
            $this->form_validation->set_rules('tipoFamiliar_id', 'tipoFamiliar_id', 'required');       

            $data['familiares_item'] = $this->familiares_model->get_familiares($id, $arrendatario_id);

            if (empty($data['familiares_item']))
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
                $this->familiares_model->modify_familiares($id, $arrendatario_id);
                redirect('familiares');
            }
        }

        public function delete($id = NULL, $arrendatario_id = NULL){            
            $this->familiares_model->delete_familiares($id, $arrendatario_id);
            redirect('familiares');
        }
}
<?php
require_once 'Entidades.php';
class Telefonos extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('telefonos_model');
            $this->load->model('arrendatarios_model');
        }

        public function index()
        {            
            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

            $data['telefonos'] = $this->telefonos_model->get_telefonos();            

            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item["arrendatario_id"]]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;            

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

            $telefonos = array();
            foreach ($this->telefonos_model->get_telefonos() as $telefonos_item) {
                array_push($telefonos, $telefonos_item["telefono_id"]);
            }

            $new_telefonos_id="";
            if(count($telefonos)>0){
                $new_telefonos_id = "TEL".sprintf("%03d", substr(max($telefonos),-3)+1);
            }else {
                $new_telefonos_id = "TEL001";
            }
            $data['new_telefonos_id'] = $new_telefonos_id;  

            $data['telefonos'] = $this->telefonos_model->get_telefonos();            

            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item["arrendatario_id"]]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;                      

            $this->form_validation->set_rules('telefono_id', 'Telefono_id', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'Arrendatario_id', 'required');
            $this->form_validation->set_rules('numero', 'Numero', 'required');

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
                $this->telefonos_model->set_telefonos();
                redirect('telefonos');
            }

        }

        public function modify($id = NULL, $telefono_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$telefono_id;
            $data['menuitem'] = get_class($this);

            $arrendatarios = array();
            foreach ($this->arrendatarios_model->get_arrendatarios() as $arrendatarios_item) {
                $arrendatarios[$arrendatarios_item["arrendatario_id"]]=$arrendatarios_item;
            }
            $data['arrendatarios'] = $arrendatarios;   
            
            $this->form_validation->set_rules('telefono_id', 'Telefono_id', 'required');
            $this->form_validation->set_rules('arrendatario_id', 'Arrendatario_id', 'required');
            $this->form_validation->set_rules('numero', 'Numero', 'required');

            $data['telefonos_item'] = $this->telefonos_model->get_telefonos($id, $telefono_id);

            if (empty($data['telefonos_item']))
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
                $this->telefonos_model->modify_telefonos($id, $telefono_id);
                redirect('telefonos');
            }
        }

        public function delete($id = NULL, $telefono_id = NULL){            
            $this->telefonos_model->delete_telefonos($id, $telefono_id);
            redirect('telefonos');           
        }
}
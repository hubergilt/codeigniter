<?php
require_once 'Entidades.php';
class TipoFamiliares extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('tipoFamiliares_model');
        }

        public function index()
        {            
            $data['tipoFamiliares'] = $this->tipoFamiliares_model->get_tipoFamiliares();            
            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

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

            $tipoFamiliares = array();
            foreach ($this->tipoFamiliares_model->get_tipoFamiliares() as $tipoFamiliares_item) {
                array_push($tipoFamiliares, $tipoFamiliares_item["tipoFamiliar_id"]);
            }          

            $new_tipoFamiliar_id="";
            if(count($tipoFamiliares)>0){
                $new_tipoFamiliar_id = "TFA".sprintf("%03d", substr(max($tipoFamiliares),-3)+1);
            }else {
                $new_tipoFamiliar_id = "TFA001";
            }
            $data['new_tipoFamiliar_id'] = $new_tipoFamiliar_id;  

            $this->form_validation->set_rules('tipoFamiliar_id', 'Arredatario_id', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');         

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
                $this->tipoFamiliares_model->set_tipoFamiliares();
                redirect('tipoFamiliares');
            }

        }

        public function modify($id = NULL, $tipoFamiliar_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$tipoFamiliar_id;
            $data['menuitem'] = get_class($this);

            $this->form_validation->set_rules('tipoFamiliar_id', 'Arredatario_id', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');     

            $data['tipoFamiliares_item'] = $this->tipoFamiliares_model->get_tipoFamiliares($id, $tipoFamiliar_id);

            if (empty($data['tipoFamiliares_item']))
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
                $this->tipoFamiliares_model->modify_tipoFamiliares($id, $tipoFamiliar_id);
                redirect('tipoFamiliares');
            }
        }

        public function delete($id = NULL, $tipoFamiliar_id = NULL){            
            $this->tipoFamiliares_model->delete_tipoFamiliares($id, $tipoFamiliar_id);
            redirect('tipoFamiliares');         
        }
}
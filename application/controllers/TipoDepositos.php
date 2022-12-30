<?php
require_once 'Entidades.php';
class TipoDepositos extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('tipoDepositos_model');
        }

        public function index()
        {            
            $data['tipoDepositos'] = $this->tipoDepositos_model->get_tipoDepositos();            
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

            $tipoDepositos = array();
            foreach ($this->tipoDepositos_model->get_tipoDepositos() as $tipoDepositos_item) {
                array_push($tipoDepositos, $tipoDepositos_item["tipoDeposito_id"]);
            }

            $new_tipoDeposito_id="";
            if(count($tipoDepositos)>0){
                $new_tipoDeposito_id = "TDE".sprintf("%03d", substr(max($tipoDepositos),-3)+1);
            }else {
                $new_tipoDeposito_id = "TDE001";
            }
            $data['new_tipoDeposito_id'] = $new_tipoDeposito_id;  

            $this->form_validation->set_rules('tipoDeposito_id', 'TipoDeposito_id', 'required');
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
                $this->tipoDepositos_model->set_tipoDepositos();
                redirect('tipoDepositos');
            }

        }

        public function modify($id = NULL, $tipoDeposito_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$tipoDeposito_id;
            $data['menuitem'] = get_class($this);            

            $this->form_validation->set_rules('tipoDeposito_id', 'TipoDeposito_id', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');

            $data['tipoDepositos_item'] = $this->tipoDepositos_model->get_tipoDepositos($id, $tipoDeposito_id);

            if (empty($data['tipoDepositos_item']))
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
                $this->tipoDepositos_model->modify_tipoDepositos($id, $tipoDeposito_id);
                redirect('tipoDepositos');
            }
        }

        public function delete($id = NULL, $tipoDeposito_id = NULL){            
            $this->tipoDepositos_model->delete_tipoDepositos($id, $tipoDeposito_id);
            redirect('tipoDepositos');
        }
}
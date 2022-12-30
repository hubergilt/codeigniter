<?php
require_once 'Entidades.php';
class TipoAmbientes extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('tipoAmbientes_model');
        }

        public function index()
        {            
            $data['tipoAmbientes'] = $this->tipoAmbientes_model->get_tipoAmbientes();            
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

            $tipoAmbientes = array();
            foreach ($this->tipoAmbientes_model->get_tipoAmbientes() as $tipoAmbientes_item) {
                array_push($tipoAmbientes, $tipoAmbientes_item["tipoAmbiente_id"]);
            }

            $new_tipoAmbiente_id="";
            if(count($tipoAmbientes)>0){
                $new_tipoAmbiente_id = "TAM".sprintf("%03d", substr(max($tipoAmbientes),-3)+1);
            }else {
                $new_tipoAmbiente_id = "TAM001";
            }
            $data['new_tipoAmbiente_id'] = $new_tipoAmbiente_id;                       

            $this->form_validation->set_rules('tipoAmbiente_id', 'TipoAmbiente_ID', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('acabado', 'Acabado', 'required');

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
                $this->tipoAmbientes_model->set_tipoAmbientes();
                redirect('tipoAmbientes');
            }

        }

        public function modify($id = NULL, $tipoAmbiente_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$tipoAmbiente_id;
            $data['menuitem'] = get_class($this);

            $this->form_validation->set_rules('tipoAmbiente_id', 'TipoAmbiente_ID', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('acabado', 'Acabado', 'required');

            $data['tipoAmbientes_item'] = $this->tipoAmbientes_model->get_tipoAmbientes($id, $tipoAmbiente_id);

            if (empty($data['tipoAmbientes_item']))
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
                $this->tipoAmbientes_model->modify_tipoAmbientes($id, $tipoAmbiente_id);
                redirect('tipoAmbientes');
            }
        }

        public function delete($id = NULL, $tipoAmbiente_id = NULL){            
            $this->tipoAmbientes_model->delete_tipoAmbientes($id, $tipoAmbiente_id);
            redirect('tipoAmbientes');
        }
}
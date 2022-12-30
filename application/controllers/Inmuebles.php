<?php
require_once 'Entidades.php';
class Inmuebles extends Entidades {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('inmuebles_model');
        }

        public function index()
        {            
            $data['inmuebles'] = $this->inmuebles_model->get_inmuebles();

            $data['home_title'] = 'Lista de '.get_class($this);
            $data['menuitem'] = get_class($this);

            $inmuebles = array();
            foreach ($this->inmuebles_model->get_inmuebles() as $inmuebles_item) {
                $inmuebles[$inmuebles_item["inmueble_id"]]=$inmuebles_item;
            }
            $data['inmuebles'] = $inmuebles;

            $departamentos=Array("AMAZONAS","ANCASH","APURIMAC","AREQUIPA","AYACUCHO","CAJAMARCA","CALLAO","CUSCO",
                                "HUANCAVELICA","HUANUCO","ICA","JUNIN","LA LIBERTAD","LAMBAYEQUE","LIMA","LORETO",
                                "MADRE DE DIOS","MOQUEGUA","PASCO","PIURA","PUNO","SAN MARTIN","TACNA","TUMBES","UCAYALI");
            $data['departamentos'] = $departamentos;            

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

            $inmuebles = array();
            foreach ($this->inmuebles_model->get_inmuebles() as $inmuebles_item) {
                array_push($inmuebles, $inmuebles_item["inmueble_id"]);
            }

            $new_inmueble_id="";
            if(count($inmuebles)>0){
                $new_inmueble_id = "INM".sprintf("%03d", substr(max($inmuebles),-3)+1);
            }else {
                $new_inmueble_id = "INM001";
            }            
            $data['new_inmueble_id'] = $new_inmueble_id;            

            $data['inmuebles'] = $this->inmuebles_model->get_inmuebles();

            $departamentos=Array("LIMA"=>"LIMA","PUNO"=>"PUNO");
            $data['departamentos'] = $departamentos;

            $provincias=Array(
                "LIMA"=>Array("LIMA"=>"LIMA"),
                "PUNO"=>Array("PUNO"=>"PUNO")
            );
            $data['provincias'] = $provincias;

            $distritos=Array(
                "LIMA"=>Array("LOS OLIVOS"=>"LOS OLIVOS","RIMAC"=>"RIMAC"),
                "PUNO"=>Array("PUNO"=>"PUNO")
            );     
            $data['distritos'] = $distritos;           
            
            $this->form_validation->set_rules('inmueble_id', 'inmueble_id', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('pisos', 'Pisos', 'required');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('distrito', 'Direccion', 'required');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $this->form_validation->set_rules('departamento', 'Departamento', 'required');

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
                $this->inmuebles_model->set_inmuebles();
                redirect('inmuebles');
            }

        }

        public function modify($id = NULL, $inmueble_id = NULL)
        {            
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['home_title'] = 'Modificar '.get_class($this).' : '.$id.'-'.$inmueble_id;
            $data['menuitem'] = get_class($this);

            $inmuebles = array();
            foreach ($this->inmuebles_model->get_inmuebles() as $inmuebles_item) {
                array_push($inmuebles, $inmuebles_item["inmueble_id"]);
            }            

            $data['inmuebles'] = $this->inmuebles_model->get_inmuebles();

            $departamentos=Array("LIMA"=>"LIMA","PUNO"=>"PUNO");
            $data['departamentos'] = $departamentos;

            $provincias=Array(
                "LIMA"=>Array("LIMA"=>"LIMA"),
                "PUNO"=>Array("PUNO"=>"PUNO")
            );
            $data['provincias'] = $provincias;

            $distritos=Array(
                "LIMA"=>Array("LOS OLIVOS"=>"LOS OLIVOS","RIMAC"=>"RIMAC"),
                "PUNO"=>Array("PUNO"=>"PUNO")
            );     
            $data['distritos'] = $distritos;  

            $this->form_validation->set_rules('inmueble_id', 'inmueble_id', 'required');            
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('pisos', 'Pisos', 'required');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('distrito', 'Direccion', 'required');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $this->form_validation->set_rules('departamento', 'Departamento', 'required');

            $data['inmuebles_item'] = $this->inmuebles_model->get_inmuebles($id, $inmueble_id);

            if (empty($data['inmuebles_item']))
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
                $this->inmuebles_model->modify_inmuebles($id, $inmueble_id);
                redirect('inmuebles');
            }
        }

        public function delete($id = NULL, $inmueble_id = NULL){            
            $this->inmuebles_model->delete_inmuebles($id, $inmueble_id);
            redirect('inmuebles');              
        }
}
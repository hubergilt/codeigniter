<?php
class Pages extends CI_Controller {

	public function view($page = 'home')
	{
		$this->load->library('session');
		$this->load->helper('url');
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			//$this->load->view('home_view', $data);
			if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->model('Inmuebles_model');
            $this->load->model('Ambientes_model');
            $this->load->model('Arrendatarios_model');
            $this->load->model('Depositos_model');
            $this->load->model('Familiares_model');
            $this->load->model('Telefonos_model');
            $this->load->model('TipoAmbientes_model');
            $this->load->model('TipoDepositos_model');
            $this->load->model('TipoFamiliares_model');

            $inmuebles = $this->Inmuebles_model->get_inmuebles();
            $ambientes = $this->Ambientes_model->get_ambientes();
            $arrendatarios = $this->Arrendatarios_model->get_arrendatarios();
            $depositos = $this->Depositos_model->get_depositos();
            $familiares = $this->Familiares_model->get_familiares();
            $telefonos = $this->Telefonos_model->get_telefonos();
            $tipoAmbientes = $this->TipoAmbientes_model->get_tipoAmbientes();
            $tipoDepositos = $this->TipoDepositos_model->get_tipoDepositos();
            $tipoFamiliares = $this->TipoFamiliares_model->get_tipoFamiliares();
            
            $data['inmuebles'] = $inmuebles;
            $data['ambientes'] = $ambientes;
			$data['arrendatarios'] = $arrendatarios;
            $data['depositos'] = $depositos;
            $data['familiares'] = $familiares;
            $data['telefonos'] = $telefonos;
            $data['tipoAmbientes'] = $tipoAmbientes;
            $data['tipoDepositos'] = $tipoDepositos;
            $data['tipoFamiliares'] = $tipoFamiliares;            

	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/menubar', $data);
	        $this->load->view('templates/leftbar', $data);	        
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);					
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
}
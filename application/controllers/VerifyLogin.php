<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    //$this->load->model('user','',TRUE);
  }

  function index()
  {
    $this->load->library('session');
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->load->helper('url');    
    $username=$this->input->post('username');
    $password=$this->input->post('password');
    $recordarme = $this->input->post('recordarme');
    //echo "hola mundo! username:".sha1($username).", password:".sha1($password).", recordarme:".$recordarme;

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $this->load->helper('form');
      $this->load->view('login/login');
    }
    else
    {
      //Go to private area
      redirect('home', 'refresh');
    }    
  } 
  
  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
    $password=$this->input->post('password');
    $recordarme = $this->input->post('recordarme');

    if($recordarme){
      //$this->session->sess_expiration = 10800; // 3 hours
      $this->session->sess_expire_on_close = TRUE;
      $this->session->set_userdata('recordarme', true);
    }

    $sha1_username="8fe65c3a1e57fa266b6ac3022197698c324b15ba";
    $sha1_password="29351dd5085dad16f331152f6236140e90c17a84";

    if(sha1($username)===$sha1_username and sha1($password)===$sha1_password){
      $sess_array = array(
        'id' => "1",
        'username' => $username
      );
      $this->session->set_userdata('logged_in', $sess_array);    
      return TRUE;    
    } 
    else {
      $this->form_validation->set_message('check_database', 'Usuario o contraseña invalida!');
      return FALSE;
    }
  }

  function logout()
  {
    $this->load->library('session');
    $this->load->helper('url'); 

    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('login', 'refresh');
  }

}
?>
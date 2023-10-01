<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('My_model', 'model');		
		$this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
       
	}

	public function index()
	{		
		$data				= array();
		$data['usertype'] 	= $this->model->getAll('usertype');	
		$this->load->helper(array('form', 'url'));
		 $this->load->library('form_validation');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('usertype', 'User Type', 'required');		
		 if ($this->form_validation->run() == FALSE){
			
			 $data['error'] = validation_errors();
			 $this->load->view('login_page',$data);
		 } else {
		
					$usertype 		= $this->input->post('usertype');					
					$username 		= $this->input->post('email');
					$password  		= md5($this->input->post('password'));
									
					$where = array(
						 'email'=>$username,
						  'password'=>$password
						   );
					
						$result = $this->model->row($where, 'users');              
					
						if(empty($result)) {
						
								$attempt	=	$this->session->userdata('attempt');				
								$attempt++;
								$this->session->set_userdata('attempt',$attempt);
								$this->session->set_flashdata('success', 'Incorrect username or Password');
								if($this->session->userdata('attempt')>=5){
									redirect(base_url('login'));										
								}			
						}
							$this->session->set_userdata('user_id', $result->id);							
							$this->session->set_userdata('user_type', $usertype);
							$this->session->set_userdata('username', $result->name);
							$this->session->set_userdata('signin', true);
							$this->session->unset_userdata('attempt');
							
			if($usertype =='1'){
					redirect(base_url('manager/'));				
			}else {					
		          redirect(base_url('developer/'));
			}
		 }
		
	}
	
}

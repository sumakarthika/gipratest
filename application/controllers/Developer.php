<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Developer extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('My_model','model');
		 $this->user_id = $this->session->userdata('user_id');
		$this->user_type = $this->session->userdata('user_id');	
		if(!empty($this->session->userdata('signin'))){
			if($this->session->userdata('user_type')!='2'){
				redirect(base_url('login'));
			}
		}		
	}
	public function index(){
		$data = array();		
		$data['users'] = $this->model->getAll('users');
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('developer');
		$this->load->view('inc/footer');
		
	}//end fn index
	
	public function edit_developer(){
		$where 						= array('id'=>$this->user_id);
		$data=array('seo_title'	=> "Edit User");	
		$data['userdetails']			= $this->model->row($where,'users');
		$data['usertype'] = $this->model->getAll('usertype');		
		if($this->input->post('submit')){
		 $updata = array(
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'address'=>$this->input->post('address'),
						'dob'=>$this->input->post('dob'),
						'phone'=>$this->input->post('phone'),
						'gender'=>$this->input->post('gender'),
						'password'=>md5($this->input->post('password')),
						'usertype_id'=>$this->input->post('usertype'),
						
					);		
					if(!empty($_FILES["image"]["name"])){
									@unlink('uploads/'.$data['userdetails']->image);	
									$filename 	= basename($_FILES["image"]["name"]);
									$ext			= strtolower(@end(explode('.', $filename)));
									$upload_img		="user_".rand().".".$ext ;
									$uploadfile = "uploads";
									move_uploaded_file($_FILES["image"]["tmp_name"],$uploadfile."/".$upload_img);									
									$updata['image'] = $upload_img;	
							 
					}
					
				
			$this->model->update($updata,$where,'users');			
			$this->session->set_flashdata('success', 'users updated Successfully.');
			redirect(base_url('edit_developer'));
		}
		$data['users'] = $this->model->getAll('users');
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('edit_developer',$data);
		$this->load->view('inc/footer');
	}
	
	public function Signout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('signin');
		redirect(base_url('login'));
	}
}//end class Home 
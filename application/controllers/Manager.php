<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('My_model','model');
		 $this->user_id = $this->session->userdata('user_id');
		$this->user_type = $this->session->userdata('user_id');	
		if(!empty($this->session->userdata('signin'))){
			if($this->session->userdata('user_type')!='1'){
				redirect(base_url('login'));
			}
		}		
	}
	public function index(){
		$data = array();		
		$data['users'] = $this->model->getAll('users');
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('manager');
		$this->load->view('inc/footer');
		
	}//end fn index
	public function users(){
		$data = array();
		
		$data['users'] = $this->model->getAll('users');
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('view_users',$data);
		$this->load->view('inc/footer');
	}
	public function add_user(){
		$data = array();
		$data['seo_title']  = "Add New User";
		$data['usertype'] = $this->model->getAll('usertype');
		$this->form_validation->set_rules('name', 'First ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		 $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|callback_valid_password');
		 $this->form_validation->set_rules('passconf', 'Retype Password', 'required|matches[password]');
		 $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('usertype', 'User Type', 'required');		
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
	
	
            $this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('add_user',$data);
		$this->load->view('inc/footer');
        }
        else
        {
					
				  $insertdata = array(
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
						
									$filename 	= basename($_FILES["image"]["name"]);
									$ext			= strtolower(@end(explode('.', $filename)));
									$upload_img		="user_".rand().".".$ext ;
									$uploadfile = "uploads";
									move_uploaded_file($_FILES["image"]["tmp_name"],$uploadfile."/".$upload_img);									
									$insertdata['image'] = $upload_img;	
							 
					}
					
				
					$this->model->insert($insertdata,'users');
					$this->session->set_flashdata('success','user added Successfully');
					redirect(base_url('users'));
			}
			
			
					
		
		
		
	}
	public function edit_user($id=null){
		$where 						= array('id'=>$id);
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
			redirect(base_url('manager/users'));
		}
		$data['users'] = $this->model->getAll('users');
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('edit_user',$data);
		$this->load->view('inc/footer');
	}
	public function delete_user($id=null){
		$where=array('id'=>$id);
		$data['userdetails']			= $this->model->row($where,'users');
		@unlink('uploads/'.$data['userdetails']->image);		
		$this->model->delete($where,'users');
		redirect(base_url('manager/users'));
	}
	//edit profile
	public function profile_edit(){
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
			redirect(base_url('profile_edit'));
		}
		$data['users'] = $this->model->getAll('users');
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('edit_user',$data);
		$this->load->view('inc/footer');
	}
	
	public function Signout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('signin');
		redirect(base_url('login'));
	}
	public function valid_password($password = '')
	{
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');

			return FALSE;
		}

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

			return FALSE;
		}

		if (strlen($password) > 32)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

			return FALSE;
		}

		return TRUE;
	}
	//strong password end
}//end class Home 
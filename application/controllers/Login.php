<?php
defined('BASEPATH') or die('No direct script access allowed');

/**
 * User authentication
 */
class Login extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');

		if($this->session->userdata('username')){
			redirect(base_url().'event');
		}
	}

	public function index(){		

		$this->load->view('login/Loginform');
	}

	public function userReg(){

		$this->load->view('login/Register');
	}

	public function userlogin(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('userpassword', 'userpassword', 'required');

		if ($this->form_validation->run()){
			$username = $this->input->post('username');
			$userpassword = $this->input->post('userpassword');
			$userdata = $this->LoginModel->validate($username,$userpassword);
				
			if(!empty($userdata))
			{
				$loggedUser = array(
					'id' => $userdata->id,
					'fname' => $userdata->fname,
					'lname' => $userdata->lname,
					'phone' => $userdata->phone,
					'username' => $userdata->username
				);
				
				$this->session->set_userdata($loggedUser);
				redirect(base_url().'event');
				exit(); 
			}
			else{
				echo "<h2 style='color:red;text-align:center;'>Login failed</h2>";
			}
		}
		else{
				echo "<h2 style='color:red;text-align:center;'>Please enter username and password to login.</h2>";
		}
		$this->index();
	}

	public function userRegister(){

		$this->form_validation->set_rules('fname', 'fname', 'required');
		$this->form_validation->set_rules('lname', 'lname', 'required');
		$this->form_validation->set_rules('pnumber', 'pnumber', 'required');
		$this->form_validation->set_rules('age', 'age', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('rePassword', 'rePassword', 'required');

		if ($this->form_validation->run()){

			if($this->input->post('password') === $this->input->post('rePassword')){

			$pnumber = $this->input->post('pnumber');
			$username = $this->input->post('username');

			$getUser = $this->LoginModel->user_validate($pnumber, $username);
			
			if(!empty($getUser)){	
				if(isset($getUser['error']))
				{
					echo "<h5 style='color:red;text-align:center;'>".$getUser['error']."</h5>";
				}
				else{
					echo "<h5 style='color:red;text-align:center;'>This username or phone number already exists</h5>";
				}				
			}
			else{
				$userDetails = array(
					'fname' => $this->input->post('fname'),
					'lname' => $this->input->post('lname'),
					'phone' => $this->input->post('pnumber'),
					'age' => $this->input->post('age'),
					'username' => $this->input->post('username'),
					'password' =>md5($this->input->post('password')),
				);

				$userdata['user'] = $this->LoginModel->register($userDetails);

				if(!empty($userdata['user']))
				{
					echo "<h5 style='color:green;text-align:center;'>User ".$this->input->post('fname')." ".$this->input->post('lname').". has been registered successfully.</h5>";
					echo "<h6 style='color:green;text-align:center;'>Please Login to create an event</h6>";
					redirect(base_url());
					exit();
				}
				else{
					echo "<h5 style='color:red;text-align:center;'>Issue occured with registration. Please try again later </h5>";
				}
			}			
		}
		else
		{
			echo "<h5 style='color:red;text-align:center;'>Passwords do not match</h5>";
		}
	}
	else
	{
		echo "<h5 style='color:red;text-align:center;'>Please fill all the fields before you submit the form</h5>";
	}
	$this->userReg();
	}	
}
?>
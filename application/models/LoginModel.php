<?php
/**
 * User CRUD model
 */
class LoginModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function validate($username,$userpassword){
		$user = $this->db->get_where('users', array('username' => $username))->row();
		if($user->password == md5($userpassword))
		{
			return $user;
		}
		else{
			return false;
		}
	}

	public function register($userDetails){

		return $this->db->insert('users',$userDetails);
	}

	public function user_validate($pnumber, $username){
		$user = $this->db->get_where('users', array('username' => $username))->row();
		$data = array();
		if(!empty($user))
		{
			$data['error'] = 'This username already exists';
		}
		else{
			$userphone = $this->db->get_where('users', array('phone' => $pnumber))->row();
			if(!empty($userphone)){
				$data['error'] = 'This phone number already exists';
			}
		}
		
		return $data;
	}
}
?>
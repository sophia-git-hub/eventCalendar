<?php
defined('BASEPATH') or die('No direct script access allowed');

/**
 * Logout from current session
 */
class LogOut extends CI_controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>
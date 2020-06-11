<?php
defined('BASEPATH') or die('No direct script access allowed');

class Event extends CI_Controller
{	
	    public function __construct() { 
        parent::__construct();          
        $this->load->model('EventModel'); 
        $this->load->helper('form');
        $this->load->library('session');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: POST, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
    } 
     
    public function index(){    
        $this->load->view('pages/Event'); 
    } 
     
   public function loadEvents(){
   		$event_data = $this->EventModel->get_event();

   		foreach ($event_data as $row) {
   			$username = $this->EventModel->getUsername($row->id);
			
   			$data[] = array(
   				'title' => $row->title,
   				'description' => $row->description,
   				'start' => $row->start_time,
   				'end' => $row->end_time, 
   				'allDay' => false
   			);
		}

  		echo json_encode($data);
   }

   public function insert() {
   		$title = $this->input->post('title');
   		$desc = $this->input->post('desc');
        $start = $this->input->post('start');
        $end = $this->input->post('end');

        $data = array(
        	'userid' => $this->session->userdata('userid'),
        	'title' => $title,
        	'description' => $desc,
        	'start_time' => $start,
        	'end_time' => $end, 
        );

        $this->EventModel->insert_event($data);
    }  

    public function update()
	{
	  if($this->input->post('id'))
	  {
	   $data = array(
	   	'userid' => $this->session->userdata('userid'),
	    'title'   => $this->input->post('title'),
	    'description' => $this->input->post('desc'),
	    'start_event' => $this->input->post('start'),
	    'end_event'  => $this->input->post('end')
	   );

	   $this->EventModel->update_event($data, $this->input->post('id'));
	  }
	}

	public function delete()
	 {
	  if($this->input->post('id'))
	  {
	   $this->EventModel->delete_event($this->input->post('id'));
	  }
	 }
}
?>
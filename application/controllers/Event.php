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
   				'id' => $row->id,
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
        	'userid' => $this->session->userdata('id'),
        	'title' => $title,
        	'description' => $desc,
        	'start_time' => $start,
        	'end_time' => $end, 
        );

        $this->EventModel->insert_event($data);
    }  

    public function updateEvent()
	{	
	  $data = array(
	   	'userid' => $this->session->userdata('id'),
	    'title'   => $this->input->post('title'),
	    'description' => $this->input->post('desc'),
	    'start_time' => $this->input->post('start'),
	    'end_time'  => $this->input->post('end')
	   );
	   
	   $this->EventModel->update_event($data, $this->input->post('id'));
	  
	}

	public function findEvent(){
		$start = $this->input->post('start');
        $startTime = explode(' ', $start);
        $getEvent = $this->EventModel->eventExist($startTime[0]);        

        if (!empty($getEvent)) {
        	echo 0;
        }
        else {
        	echo 1;
        }
	}

	public function delete()
	 {
	  if($_GET['id'])
	  {
	   $this->EventModel->delete_event($_GET['id']);
	   return "event deleted";
	  }
	  return "event not deleted";
	 }
}
?>
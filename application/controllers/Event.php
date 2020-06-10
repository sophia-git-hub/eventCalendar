<?php
defined('BASEPATH') or die('No direct script access allowed');

/**
 * 
 */
class Event extends CI_Controller
{	
	    public function __construct() { 
        parent::__construct();          
        $this->load->model('EventModel'); 
    } 
     
    public function index(){    
        $this->load->view('pages/Event'); 
    } 
     
   public function get_event(){
   		$event_data = $this->EventModel->get_event();

   		foreach ($event_data as $row) {
   			$data[] = array(
   				'id' => $row['id'],
   				'title' => $row['title'],
   				'description' => $row['description'],
   				'start_date' => $row['start_time'],
   				'end_date' => $row['end_time'], 
   			);
   		}

   		echo json_encode($data);
   }

    public function get_eventing() {

        $start = $this->input->get("start");
        $end = $this->input->get("end");

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $start_format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $end_format = $enddt->format('Y-m-d H:i:s');

        $events = $this->main_model->get_events($start_format, $end_format);

        $data_events = array();

        foreach ($events->result() as $r) {

            $data_events[] = array(
                "id" => $r->id,
                "title" => $r->title,
                "end_event" => $r->end_event,
                "start_event" => $r->start_event
            );
        }


        echo json_encode(array("events" =>$data_events));

        exit();
    }
}
?>
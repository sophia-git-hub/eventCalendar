<?php
/**
 * Database operations to get and add events
 */
class EventModel extends CI_Model
{
	function __construct() { 
        $this->load->database(); 
    } 

    function get_event(){
    	$events = $this->db->get('events')->result();
    	return $events;
    }

    function getUsername($id){
    	$username = $this->db->select('username')->get_where('users', array('id' => $id))->row();
    	return $username;
    }

    function insert_event($data){
    	return $this->db->insert('events', $data);
    }

    function update_event($data, $id)
	{
	  $this->db->where('id', $id);
	  $updateEvent = $this->db->update('events', $data);
	}

	function delete_event($id)
	{
	  $this->db->where('id', $id);
	  $this->db->delete('events');
	}

	function eventExist($stat){
		

	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	//show_name()
	//This function load the view. 
	public function show_name(){
		$this->load->view('show_name');
	}
	//Get all user from database
	//database.php have got all params to do modify the connection
	//This function get_user and delete it.
	public function get_user(){
		$result = $this->db->get('user')->result();
		$arr_data = array();
		$i = 0;
		foreach($result as $r){
			$arr_data[$i]['id'] 		= $r->id;
			$arr_data[$i]['FName']		= $r->FName;
			$arr_data[$i]['LName']		= $r->LName;
			$arr_data[$i]['isActive']	= $r->isActive;
			$i++;
		}

		echo json_encode($arr_data);
	}
	//Insert all user data in DB
	//We decode a json
	//The controller is in app.js
	public function insert_user(){
		$_POST 	= json_decode(file_get_contents('php://input'), true);
		$data 	= $this->input->post();
		$id 	= intval($data['id']);
		//This array help you to understand which params get in the request
		$array 	= array(
				'FName' => $data['FName'],
				'LName'	=> $data['LName'],
				'isActive' => $data ['isActive']
			);
		print_r($array);
		//This part update the user information
		if($data['btnName'] == "Update"){
			$this->db->where('id', $id);
			$this->db->update('user', $array);
		}
		//This part insert user information
		else{
			$this->db->insert('user', $array);
		}
		
	}

	//This function delete user
	public function deleteUser(){
		$data 	= json_decode(file_get_contents('php://input'));
		$id 	= $data->id;
		$this->db->where('id', $id);
		$this->db->delete('user');
	}


}

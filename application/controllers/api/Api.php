<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller{

  	public function index_get(){
  		$tes = ['status' => 'ok'];
    	$this->set_response($tes);
  	}

	public function index_post(){
    
		$nim = $this->post('nim');
		$room = $this->post('room');
    	$this->set_response($nim, REST_Controller::HTTP_OK);
  	}

  	public function user_post(){
  		$card_id = $this->post('id');
  	}
}

?>
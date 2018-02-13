<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function add(){
		echo "Hi My name is bilal";
	}
}

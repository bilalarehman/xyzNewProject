<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	/**
	 * @ Design & Developed by I-Tech Stellar
	 *
	 * 	Version 1.0.0
	 * 	
	 *	visit itechstellar.com
	 * 	
	 */
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	function add(){
		echo "Hi My name is bilal";
	}
}

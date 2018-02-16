<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['page_title'] = 'NULL';
		$this->template->load('welcome_message', $data);
	}
}

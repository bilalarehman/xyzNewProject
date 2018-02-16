<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

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
		if (isset($_POST['submit'])) 
		{
			extract($_POST);
			$this->main_db->update('inf_app', null, null, $info);
			$this->session->set_flashdata('success', 'Record Updated Successfullt!');
			redirect('app');
		}
		else
		{
			$data['title'] = 'App Info';
			$data['app_info'] = $this->main_db->view('*', 'inf_app');
			$this->template->load('app/index', $data);
		}
	}
}

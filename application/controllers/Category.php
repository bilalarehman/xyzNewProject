<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
		if (isset($_POST['addCategory'])) 
		{
			extract($_POST);
			$info['allow'] = 'Y';
			$this->main_db->add('inf_category', $info);
			$this->session->set_flashdata('success', 'Category Added Successfully!');
			redirect('category');
		}

		if (isset($_POST['upCategory'])) 
		{
			extract($_POST);
			$this->main_db->update('inf_category', 'id', $id, $info);
			$this->session->set_flashdata('success', 'Category Updated Successfully!');
			redirect('category');
		}


		$data['title'] = "Category";
		$data['infoCategory'] = $this->main_db->view('*', 'inf_category');
		$data['parentInfo'] = $this->main_db->view_name('inf_category', 'id', 'name', ['allow'=>'Y']);

		$this->template->load('category/index', $data);

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Options extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('options_model');
		$this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	
		if($this->main_db->check_login($this->router->fetch_class()) === TRUE) 
		{
			$this->current_user = $this->aauth->get_user();
		}
		else
		{
			redirect('login/restriction');
		}

	}

	public function index(){

			$data['page_main_title'] = "OPTIONS";

			$this->load->view('header', $data);
			$this->load->view('nav');
			$this->load->view('options/index', $data);
			$this->load->view('footer');		
	}

	function menu(){

		if (isset($_POST['updateSub'])) 
		{
			extract($_POST);
			$info['ALLOW_GROUP'] = implode(',', $allow);
			$this->main_db->update_single('inf_sub_menu', 'SMENUID', $id, $info);
			$this->session->set_flashdata('success', "Record Updated Successfully!");
			
		}
		if (isset($_POST['updateMain'])) 
		{
			extract($_POST);
			$info['ALLOW_GROUP'] = implode(',', $allow);
			$this->main_db->update_single('inf_main_menu', 'PMENUID', $id, $info);
			$this->session->set_flashdata('success', "Record Updated Successfully!");
			
		}		
		if (isset($_POST['deleteSub'])) 
		{
			extract($_POST);
			$this->main_db->delete_single('inf_sub_menu', 'SMENUID', $id);
			$this->session->set_flashdata('success', "Record Deleted Successfully!");
			
		}
		if (isset($_POST['deleteMain'])) 
		{
			extract($_POST);
			$this->main_db->delete_single('inf_main_menu', 'PMENUID', $id);
			$this->session->set_flashdata('success', "Record Deleted Successfully!");
			
		}		
		if (isset($_POST['addMain'])) 
		{
			extract($_POST);
			$info['ALLOW_GROUP'] = implode(',', $allow);
			$this->main_db->add_single('inf_main_menu', $info);
			$this->session->set_flashdata('success', "Record Deleted Successfully!");
			
		}	
		if (isset($_POST['addSub'])) 
		{
			extract($_POST);
			$info['ALLOW_GROUP'] = implode(',', $allow);
			$this->main_db->add_single('inf_sub_menu', $info);
			$this->session->set_flashdata('success', "Record Deleted Successfully!");
			
		}			


		$data['page_main_title'] = "Menu";
		$query = $this->db->query('SELECT * FROM inf_main_menu ORDER BY ORDER_BY');
		$groups = $this->aauth->list_groups();
		$groups_array = [];

		foreach ($groups as $g) 
		{
			$groups_array[$g->name] = $g->name;
		}

		$data['info_main_menu'] = $query->result();
		$data['groups'] = $groups_array;
		$data['mainMenu'] = $this->main_db->view_name('inf_main_menu', 'PMENUID', 'PMENUNAME');;

		$this->template->load('options/view_menu', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index(){
		
		if($this->aauth->is_loggedin())
		{
			redirect('dashboard/index', 'refresh');
		}
		else
		{
			$data['title'] = 'Login';
			$this->load->view('view_login', $data);		
		}

	}

	function verifylogin(){

		if($this->aauth->is_loggedin() === false)
		{
			extract($_POST);

			if($this->aauth->login($email, $pass))
			{
				redirect("dashboard/index");
			}
			else
			{	
				$this->session->set_flashdata('error', 'Wrong email and password!');
				redirect('login/index', 'refresh');
			}
		}

	}

	public function logout()
	{
		$this->aauth->logout();
		redirect('login');
	}

	function restriction($msg=null)
	{
		$data['page_main_title'] = "Restriction";
		$data['message'] = $msg;

		$this->load->view('header_report', $data);
		$this->load->view('restriction', $data);
	}


	function update_pass()
	{
		if(isset($_POST['submit']))
		{
			extract($_POST);

			$previous_pass = $this->aauth->hash_password($info['PP'], $this->aauth->get_user_id());

			$check_pass = $this->main_db->view_double('aauth_users', 'id', 'pass', $this->aauth->get_user_id(), $previous_pass);

			if ($check_pass != false)
			{
				if($info['NP'] != $info['CP'])
				{
					$this->session->set_flashdata('error', "New Password Not Match!");
					redirect('login/update_pass');
				}
				else
				{
					if($this->aauth->update_user($this->aauth->get_user_id(), '', $info['NP']))
					{
						$this->session->set_flashdata('success', "Password update successfully! Please Login Again");
						$this->aauth->logout();
						redirect('login');
					}
					else
					{
						$this->session->set_flashdata('error', "Password Not update!");
						redirect('login/update_pass');
					}
				}

			}
			else
			{
				$this->session->set_flashdata('error', "Wrong Current Password!");
				redirect('login/update_pass');

			}
 

		}
		else
		{
			// Code for PageTitle		
			$data['page_main_title'] = "Update Password";

			$this->load->view('header', $data);
			$this->load->view('nav');
			$this->load->view('view_update_pass', $data);
			$this->load->view('footer');		
		}
	}


	
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template 
{
	var $ci;

	function __construct() 
	{
		$this->ci =& get_instance();
		$this->header = 'header';
		$this->header_report = 'header_report';
		$this->nav = 'nav';
		$this->footer = 'footer';

	}

	function load($body, $data = null) 
	{
		if (! is_null($data)) 
		{
			$this->ci->load->view($this->header, $data);
			$this->ci->load->view($this->nav, $data);
			$this->ci->load->view($body, $data);
			$this->ci->load->view($this->footer, $data);
		}
	}

	function report($body, $data = null) 
	{
		if (! is_null($data)) 
		{
			$this->ci->load->view($this->header_report, $data);
			$this->ci->load->view($body, $data);
		}		
	}	
}
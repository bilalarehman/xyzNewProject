<?php

/**
*  main database quries files
**/

class User_model extends CI_Model
{			

	function user_permission($userid=0)
	{
		$this->db->select('SMENUID');
		$this->db->from('inf_allow_menu');
		$this->db->where('USERID', $userid);

		$query = $this->db->get();
		$permission = [];

	   if($query->num_rows() > 0)
	   {
	   		foreach ($query->result() as $value):

		     	$permission_name = $this->main_db->view_single('inf_sub_menu', 'SMENUID', $value->SMENUID);

		     	$permission[$permission_name[0]->SMENUID] = $permission_name[0]->MENUNAME;

	     	endforeach;

	     	return $permission;
	   }
	   else
	   {
	     return false;
	   }		
	}

	function allowed_sub($user_id, $clid, $secid)	
	{
		$this->db->select('*');
		$this->db->from('allowed_subjects');
		$this->db->where('USERID', $user_id);
		$this->db->where('CLID', $clid);
		$this->db->where('SECID', $secid);

		$query = $this->db->get();

		   if($query->num_rows() > 0)
		   {
		     return $query->result();
		   }
		   else
		   {
		     return false;
		   }
	}
	function assigned_subject($user_id, $clid, $secid, $subid)
	{
		$this->db->select('*');
		$this->db->from('allowed_subjects');
		$this->db->where('USERID', $user_id);
		$this->db->where('CLID', $clid);
		$this->db->where('SECID', $secid);
		$this->db->where('SUBID', $subid);

		$query = $this->db->get();

		   if($query->num_rows() > 0)
		   {
		     return $query->result();
		   }
		   else
		   {
		     return false;
		   }
	}

	function check_menu($pmenu, $smenu, $user)		
	{
		$this->db->select('*');
		$this->db->from('inf_allow_menu');
		$this->db->where('PMENUID', $pmenu);
		$this->db->where('SMENUID', $smenu);
		$this->db->where('USERID', $user);

		$query = $this->db->get();

		   if($query->num_rows() > 0)
		   {
		     return $query -> result();
		   }
		   else
		   {
		     return false;
		   }			
	}	

	function verifylogin($username, $password)
	 {
	   $this->db->select('*');
	   $this->db->from('inf_user');
	   $this->db->where('UNAME', $username);

	   $this->db->where('UPASS', $password);
	   $this->db->limit(1);
	 
	   $query = $this->db->get();
	 
	   if($query->num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	 }	
}



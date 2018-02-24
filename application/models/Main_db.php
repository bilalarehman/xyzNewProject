<?php

/**
*  main database quries files
**/

class Main_db extends CI_Model
{

	public function __construct() {

// $this->db->db_select('usman_campus_2');
	}

	function add($table_name, $info)
	{
		$this->db->insert($table_name, $info);
		return $this->db->insert_id();
	}


	function view($select, $table_name, $con=null, $order=null, $limit=null)
	{
		$this->db->select($select);
		$this->db->from($table_name);

		if ($con!=null) 
		{
			foreach ($con as $key => $value) 
			{
				$this->db->where($key, $value);
			}
		}

		if ($order!=null) 
		{
			$o = explode('|', $order);
			$this->db->order_by($o[0], $o[1]);
		}

		if ($limit!=null) 
		{
			$this->db->limit($limit);
		}		

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

	function view_name($table_name, $id, $name, $con=null) 
	{
		$this->db->select('*');
		$this->db->from($table_name);

		if ($con!=null) 
		{
			foreach ($con as $key => $value) 
			{
				$this->db->where($key, $value);
			}
		}

		$query = $this->db->get();
		$result = array();

		if($query->num_rows() > 0)
		{
			$result[''] = "Select an option";

			foreach ($query->result() as $row):

				$result[$row->$id] = $row->$name;

			endforeach;

			return $result;
		}
		else
		{
			return false;
		}		
	}	

	function update($table_name, $column_name=null, $id=null, $info)
	{
		if ($column_name!=null&&$id!=null) 
		{
			$this->db->where($column_name, $id);
		}
		
		$this->db->update($table_name, $info);
		if ($this->db->affected_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function delete_single($table_name, $column_name, $id)
	{
		$this->db->where($column_name, $id);
		$this->db->delete($table_name);
		if ($this->db->affected_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}		
	}

	function delete($table_name, $con)
	{
		foreach ($con as $column_name => $id) 
		{
			$this->db->where($column_name, $id);
		}

		$this->db->delete($table_name);
	}	

	function month_name()
	{
		$month = array(

			""     =>    "SELECT MONTH",
			"Jan"  =>    "January",
			"Feb"  =>    "February",
			"Mar"  =>    "March",
			"Apr"  =>    "April",
			"May"  =>    "May",
			"Jun"  =>    "June",
			"Jul"  =>    "July",
			"Aug"  =>    "August",
			"Sep"  =>    "September",
			"Oct"  =>    "October",
			"Nov"  =>    "November",
			"Dec"  =>    "December" 
		);

		return $month;
	}

	function check_permission($controller, $function)
	{
		if($this->aauth->is_admin())
		{
			return true;
		}
		else
		{
			if($this->aauth->control($controller))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	function allowed_groups()
	{
		$groups = [];

		foreach($this->aauth->get_user_groups() as $grp)
		{
			$groups[] = $grp->name;
		}

		return $groups;

	}

	function percentage($obtain, $total)
	{
		return ($obtain / $total) * 100;
	}

	function grade($per)
	{
		if($per >= 80)
		{
			return "A+";
		}
		else if($per < 80 && $per >= 70)
		{
			return "A";
		}
		else if($per < 70 && $per >= 60)
		{
			return "B";
		}		
		else if($per < 60 && $per >= 50)
		{
			return "C";
		}		
		else if($per < 50)
		{
			return "F";
		}
	}

	function grade_olevel_6_8($per)
	{
		if($per >= 90)
		{
			return "A*";
		}
		else if($per < 90 && $per >= 80)
		{
			return "A";
		}
		else if($per < 80 && $per >= 70)
		{
			return "B";
		}		
		else if($per < 70 && $per >= 60)
		{
			return "C";
		}		
		else if($per < 60 && $per >= 50)
		{
			return "D";
		}				
		else if($per < 50)
		{
			return "U";
		}
	}	

	function grade_olevel_9_12($per)
	{
		if($per >= 90)
		{
			return "A*";
		}
		else if($per < 90 && $per >= 80)
		{
			return "A";
		}
		else if($per < 80 && $per >= 70)
		{
			return "B";
		}		
		else if($per < 70 && $per >= 60)
		{
			return "C";
		}		
		else if($per < 60 && $per >= 50)
		{
			return "D";
		}				
		else if($per < 50 && $per >= 40)
		{
			return "E";
		}						
		else if($per < 40)
		{
			return "U";
		}
	}

	function grade_matric($per)
	{
		if($per >= 80)
		{
			return "A+";
		}
		else if($per < 80 && $per >= 70)
		{
			return "A";
		}
		else if($per < 70 && $per >= 60)
		{
			return "B";
		}		
		else if($per < 60 && $per >= 50)
		{
			return "C";
		}
		else if($per < 50 && $per >= 40)
		{
			return "D";
		}			
		else if($per < 40 && $per >= 33)
		{
			return "E";
		}			
		else if($per < 33)
		{
			return "F";
		}
	}	

	function convert_to_word($number)
	{
		$no = round($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array(
			'0' => '', 
			'1' => 'One', 
			'2' => 'Two',
			'3' => 'Three', 
			'4' => 'Four', 
			'5' => 'Five', 
			'6' => 'Six',
			'7' => 'Seven', 
			'8' => 'Eight', 
			'9' => 'Nine',
			'10' => 'Ten', 
			'11' => 'Eleven', 
			'12' => 'Twelve',
			'13' => 'Thirteen', 
			'14' => 'Fourteen',
			'15' => 'Fifteen', 
			'16' => 'Sixteen', 
			'17' => 'Seventeen',
			'18' => 'Eighteen', 
			'19' =>'Nineteen', 
			'20' => 'Twenty',
			'30' => 'Thirty', 
			'40' => 'Forty', 
			'50' => 'Fifty',
			'60' => 'Sixty', 
			'70' => 'Seventy',
			'80' => 'Eighty', 
			'90' => 'Ninety');
		$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += ($divider == 10) ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
			} else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);
		$points = ($point) ?
		"." . $words[$point / 10] . " " . 
		$words[$point = $point % 10] : '';
// echo $result . "Rupees  " . $points . " Paise";		

		return $result . ' Only';
	}

	function next_inc_val($from)
	{

		$next = $this->db->query("SHOW TABLE STATUS LIKE '{$from}'");
		$next = $next->row(0);
		return $next->Auto_increment;

	}

	function assesment_form($stdid, $examid)
	{
		$info_session = $this->main_db->view_single('inf_session', 'SESSIONFLAG', 'ON');

		$info_ass = $this->db->query("SELECT * FROM junior_assesment WHERE STDID = {$stdid} AND EXTID = {$examid} AND SESSIONID = {$info_session[0]->SESSIONID} AND AAID != 84");

		$assesment = [];

		foreach ($info_ass->result() as $val) 
		{
			$assesment['Assesment'][$val->HEADID][$val->AAID] = $val->KEY;

			$assesment['Teacher_comment'] = $val->TEACHER_COMMENT;
			$assesment['TDAYS'] = $val->TDAYS;
			$assesment['PDAYS'] = $val->PDAYS;
			$assesment['STATUS'] = $val->STATUS;

		}


		return $assesment;
	}


	function limit_text($text, $limit) {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}

	function check_voucher($vnum)
	{
		$vnum = $this->view('*', 'inf_challan', ['CHALLANNUM'=>$vnum]);

		if ($vnum[0]->CHECK == 'Y') 
		{
			$info['status'] = "Paid";
			$info['date'] = '';

			return $info;
		}
		elseif ($vnum[0]->CHECK == 'N')
		{
			$c_fees = explode(',', $vnum[0]->CURRENT_FEE);
			$status = true;
			foreach ($c_fees as $cFee) 
			{
				$check = $this->view('*', 'fees_new', ['CHALLANNO'=>$cFee]);
				if(isset($check[0]) && $check[0]->FEECHECK == "N") 
				{
					$status = false;
				}
				$info['date'] = (isset($check[0])) ? $check[0]->POST_DATE : '';
			}

			if($status == false) { $info['status'] = 'UnPaid'; } else { $info['status'] = 'Arrear'; };

			return $info; 
		}
	}

	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	function check_controller($c_name)
	{
		$db_centralized = $this->load->database('centralized', TRUE);
		$query = $db_centralized->query("SELECT * FROM controller_permission WHERE controller = '{$c_name}'");
		$result = $query->result();

		if (isset($result[0])) { return explode(',', $result[0]->permission); }
		else { return FALSE; }

	} 

	function check_login($c_name)
	{
		$user = $this->aauth->get_user();
		$sch = $this->view('*', 'inf_school');
		$groups = $this->check_controller($c_name);
		$allowed_groups = $this->allowed_groups();
		$check = array_intersect($groups, $allowed_groups);

		$allowed_campuses = explode(',', $user->allow_campus);

		if($this->aauth->is_loggedin() === FALSE)
		{
				return FALSE;
		}
		elseif (!in_array($sch[0]->CAMPUS_NO, $allowed_campuses))
		{
				return FALSE;
		}
		elseif (empty($check))
		{
				return FALSE;
		}
		else
		{
				return TRUE;
		}

	}

	function category_tree($plugin=null)
	{
		$data1 = $this->view('*', 'inf_category', ['allow'=>'Y']);

		foreach ($data1 as $key => $row) {
			$sub_data["id"] = $row->id;
			$sub_data["name"] = $row->name;
			$sub_data["text"] = $row->name;
			$sub_data["parent_id"] = $row->parent_id;
			$data[] = $sub_data;
		}

		foreach($data as $key => &$value)
		{
		 $output[$value["id"]] = &$value;
		}
		foreach($data as $key => &$value)
		{
		 if($value["parent_id"] && isset($output[$value["parent_id"]]))
		 {
		  $output[$value["parent_id"]][$plugin][] = &$value;
		 }
		}
		foreach($data as $key => &$value)
		{
		 if($value["parent_id"] && isset($output[$value["parent_id"]]))
		 {
		  unset($data[$key]);
		 }
		}

		return $data;
	}	

}



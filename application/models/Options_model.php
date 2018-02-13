<?php

/**
*  main database quries files
**/

class options_model extends CI_Model
{

	function allowGroup($groups=null)
	{
		if ($groups!=null) 
		{
			$groupsArray = [];

			foreach (explode(',', $groups) as $g) 
			{
				$groupsArray[$g] = $g;
			}

			return $groupsArray;
		}
		else
		{
			return false;
		}	
	}
}



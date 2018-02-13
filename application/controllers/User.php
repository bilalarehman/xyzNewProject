<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{		
		parent::__construct();		
		$this->load->model('user_model');
		
		if($this->main_db->check_login($this->router->fetch_class()) === TRUE) 
		{
			$this->current_user = $this->aauth->get_user();
		}
		else
		{
			redirect('login/restriction');
		}
		
	}

	public function index()
	{ 		
		// Code for PageTitle		
		$data['title'] = "USER";
		
		$data['info_groups'] = $this->main_db->view_name('aauth_groups', 'id', 'name');
		$data['info_users'] = $this->aauth->list_users(FALSE, FALSE, FALSE, TRUE);
		$data['info_grp'] = $this->aauth->list_groups();
		$data['info_per'] = $this->aauth->list_perms();
		
		$this->template->load('user/view_user', $data);
	}		

	function ban_user()
	{
		extract($_POST);
		$this->aauth->ban_user($user_id);
		$this->session->set_flashdata('success', 'User Banned Successfully!');
		redirect('user'); 			
	}

	function unban_user()
	{
		extract($_POST);
		$this->aauth->unban_user($user_id);
		$this->session->set_flashdata('success', 'User UnBanned Successfully!');
		redirect('user'); 			
	
	}	

	function add_user()
	{
		extract($_POST);
		$this->aauth->create_user($email, $pass, $name);
		$this->session->set_flashdata('success', 'User Added Successfully!');
		redirect('user/index#user'); 	 	
	
	}

	function edit_user()
	{
		extract($_POST);
		$this->aauth->update_user($user_id, $email, $pass, $name);
		$this->session->set_flashdata('success', 'User Updated Successfully!');
		redirect('user/index#user'); 	 		
	}

	function delete_user()
	{
		extract($_POST);
		$this->aauth->delete_user($id);
		$this->session->set_flashdata('success', 'User Deleted Successfully!');
		redirect('user/index#user'); 	 	
	}

	function add_grp()
	{
		extract($_POST);
		$this->aauth->create_group($grp_name, $grp_def);
		$this->session->set_flashdata('success', 'Group Added Successfully!');
		redirect('user/index#group'); 	
	
	}	

	function update_group()
	{
		extract($_POST);
		$this->aauth->update_group($grp_id, $grp_name, $grp_def);
	    $this->session->set_flashdata('success', 'Group Updated Successfully!');
		redirect('user/index#group'); 	
	}	

	function del_group()
	{
		extract($_POST);
		$this->aauth->delete_group($id);
	    $this->session->set_flashdata('success', 'Group Deleted Successfully!');
		redirect('user/index#group'); 		
	}	

	function add_permission()
	{
		extract($_POST);
		$this->aauth->create_perm($name, $definition);
		$this->session->set_flashdata('success', 'Permission Added Successfully!');
		redirect('user/index#permission'); 
	
	}	

	function update_per()
	{
		extract($_POST);
		$this->aauth->update_perm($id, $per_name, $per_def);
		$this->session->set_flashdata('success', 'Permission Updated Successfully!');
		redirect('user/index#permission'); 
		
	}

	function del_permission()
	{
		extract($_POST);
		$this->aauth->delete_perm($id);
		$this->session->set_flashdata('success', 'Permission Deleted Successfully!');
		redirect('user/index#permission'); 
	
	}

	function allow_group()		
	{
		extract($_POST);
		$this->aauth->allow_group($per_id, $grp_id);
	}

	function sub_menu_dropdown(){

		$main_menu = $this->input->post('main_menu');

		$sub_menu = $this->main_db->view_single('inf_sub_menu', 'PMENUID', $main_menu);

			echo '<option value="">SELECT SUB MENU</option>';

		foreach ($sub_menu as $sub):

			echo '<option value="'.$sub->SMENUID.'">'.$sub->MENUNAME.'</option>';

		endforeach;

	}

	function assign_group()
	{
		extract($_POST);

		$this->aauth->add_member($user_id, $group_id);

	}

	function unassign_group()
	{
		extract($_POST);

		$this->aauth->remove_member($user_id, $group_id);			
	}

	function assign_subject()
	{
		extract($_POST);

		$check = $this->user_model->assigned_subject($user_id, $clid, $secid, $subid);

		if($check === false)
		{
			$info['USERID'] = $user_id;
			$info['CLID'] = $clid;
			$info['SECID'] = $secid;
			$info['SUBID'] = $subid;
			$info['CUSER'] = $this->current_user->id;
			$info['CTIMESTAMP'] = date('Y-m-d h:i:s');

			$this->main_db->add_single('allowed_subjects', $info);
		}

	}

	function assigned_class()
	{
		extract($_POST);

		$allowed_class = $this->main_db->view_single('allowed_class', 'USERID', $user_id);

		$class_name = $this->main_db->view_name('inf_classes', 'CLID', 'CLNAME');
		$section_name = $this->main_db->view_name('inf_sections', 'SECID', 'SECNAME');

            if(empty($allowed_class)){ ?>

              <div class="form-group">
                <label>Class</label>
                <?php echo  form_dropdown('class', $class_name, '', 'class="form-control select2" style="width:100%;" id="class_id_a"'); ?>
              </div>  

              <div class="form-group">
                <label>Section</label>
                <select name="section" id="section_id_a" class="form-control select2" style="width:100%;">
                  <option value="">Select Class</option>
                </select>
              </div>  

              <button type="button" class="btn btn-success" data-dismiss="modal" id="classassign_confrim">Assign</button>                   
          
          <?php } /* close of if statment */ else { ?>

            <table class="table table-bordered table-striped" id="allow_class_table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th></th>
                </tr>
              </thead>
              <tr>
                <td><?php echo $allowed_class[0]->ACID; ?></td>
                <td><?php echo $class_name[$allowed_class[0]->CLID]; ?></td>
                <td><?php echo $section_name[$allowed_class[0]->SECID]; ?></td>
                <td>
                  <a class='btn btn-danger unallow_this' data-dismiss="modal">
                    <i class='fa fa-trash' aria-hidden='true'></i>
                  </a>
                </td>
              </tr>
            </table>

          <?php } /* close of else statment */     		?>

          <script type="text/javascript">

		    $("#class_id_a").change(function(){ 

		      $.ajax({
		        type: "POST",
		        url: "<?php echo site_url('classes/view_section_dropdown');?>", 
		        data: {
		                clid: $(this).val(),
		              },
		       
		        success: function(data){ $("#section_id_a").html(data); },
		        
		      }); // close ajax call 

		    });          

		    var allow_class_table = $('#allow_class_table').DataTable({'paging':false,'ordering':false,'info':false,'bFilter':false,});

			    $(".unallow_this").click(function(){

			      var data = allow_class_table.row($(this).parents('tr')).data();

			      $.ajax({
			        type: "POST",
			        url: "<?php echo site_url('user/unallow_class');?>", 
			        data: {
			                acid: data[0],
			              },			        
			      }); // close ajax call       

			    });   

		    $("#classassign_confrim").click(function(){ 

		      $.ajax({
		        type: "POST",
		        url: "<?php echo site_url('user/assign_class');?>", 
		        data: {
		                user_id: $("#as_user_id").val(),
		                classid: $('#class_id_a').val(),
		                secid: $('#section_id_a').val(),
		              },
		        
		      }); // close ajax call 

		    });			       	
          </script> <?php
	}

	function assign_class()
	{
		extract($_POST);

		$info['USERID'] = $user_id;
		$info['CLID'] = $classid;
		$info['SECID'] = $secid;
		$info['CUSER'] = $this->current_user->id;
		$info['CTIMESTAMP'] = date('Y-m-d h:i:s');

		$this->main_db->add_single('allowed_class', $info);
	}

	function unallow_class()
	{
		extract($_POST);

		$this->main_db->delete_single('allowed_class', 'ACID', $acid);
	}

	function unallow_subject()
	{
		extract($_POST);
		$this->main_db->delete_single('allowed_subjects', 'ASID', $asid);
	}

	function assigned_groups()
	{
		extract($_POST);

		$groups = $this->aauth->get_user_groups($user_id);

		echo "<span id='user_id' style='display:none;'>".$user_id."</span>";
		echo "<table class='table table-bordered table-striped table-condenced' id='groups_table'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th>id</th>";
		echo "<th>Group Name</th>";
		echo "<th></th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		foreach ($groups as $val) 
		{
			echo "<tr>";
			echo "<td>".$val->id."</td>";
			echo "<td>".$val->name."</td>";
			echo "<td><a class='btn btn-danger unassign_this'>".
                    "<i class='fa fa-trash' aria-hidden='true'></i>".
                  "</a></td>";
			echo "</tr>";
		}

		echo "</tbody>";
		echo "</table>"; ?>

		<script type="text/javascript">

			var group_table = $('#groups_table').DataTable({'paging':false,'ordering':false,'info':false,'bFilter':false,});

		    $(".unassign_this").click(function(){

		      var unassign_data = group_table.row($(this).parents('tr')).data();

		        $.ajax({
		          type: "POST",
		          url: "<?php echo site_url('user/unassign_group');?>", 
		          data: {
		                  user_id: <?php echo $user_id; ?>,
		                  group_id: unassign_data[0],
		                },
		         
		        //success: location.reload(),
		          
		          }); // close ajax call			      

		    });
		</script> <?php 

	}		

	function allowed_subjects()
	{
		extract($_POST);

		$allowed_subjects = $this->main_db->view_single('allowed_subjects', 'USERID', $user_id);

		if($allowed_subjects != false)
		{
			$info_classes = $this->main_db->view_name('inf_classes', 'CLID', 'CLNAME');
			$info_sections = $this->main_db->view_name('inf_sections', 'SECID', 'SECNAME');
			$info_subjects = $this->main_db->view_name('inf_subject', 'SUBID', 'SUBNAME');

			echo "<table class='table table-bordered table-striped table-condenced' id='as_table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>id</th>";
			echo "<th>Class</th>";
			echo "<th>Section</th>";
			echo "<th>Subject</th>";
			echo "<th></th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";		

			foreach ($allowed_subjects as $val) 
			{
				echo "<tr>";
				echo "<td>".$val->ASID."</td>";
				echo "<td>".$info_classes[$val->CLID]."</td>";
				echo "<td>".$info_sections[$val->SECID]."</td>";
				echo "<td>".$info_subjects[$val->SUBID]."</td>";
				echo "<td><a class='btn btn-danger unallow_this' data-dismiss='modal'>".
	                    "<i class='fa fa-trash' aria-hidden='true'></i>".
	                  "</a></td>";
				echo "</tr>";
			}

			echo "</tbody>";
			echo "</table>"; ?>

			<script type="text/javascript">
				
			    $(".unallow_this").click(function(){

				 var unallow_data = assign_t.row($(this).parents('tr')).data();

			        $.ajax({
			          type: "POST",
			          url: "<?php echo site_url('user/unallow_subject');?>", 
			          data: {
			                  asid: unallow_data[0],
			                },
			         
			        //success: location.reload(),
			          
			          }); // close ajax call	

			    });

				var assign_t = $('#as_table').DataTable({'paging':false,'ordering':false,'info':false,'bFilter':true,});


			</script> <?php 		
			
		}
		else
		{	
			echo "<br>";
			echo "<div class='alert alert-info'>No Subject Assigned</div>";
		}

	}

}

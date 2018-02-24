<div class="box box-primary">
	<div class="box-body">


		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addCat"><i class="fa fa-plus"></i> Add</button>
		<br><br>

		<?php if (isset($infoCategory[0])) { ?>

		Mubesher Sajid

		<div id="treeview"></div>

		<?php } else { ?>

		<div class="alert alert-info">Record Not Found!</div>

		<?php } ?>

	</div>
</div>



<!-- Add Category -->
<div id="addCat" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Category</h4>
			</div>
			<form action="" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Parent Category</label>
						<?php echo form_dropdown('info[parent_id]', $parentInfo, '', 'class="form-control select2" style="width:100%"'); ?>
					</div>

					<div class="form-group">
						<label>Category Name <span style="color: red;">*</span></label>
						<input type="text" name="info[name]" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="addCategory" class="btn btn-success">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>


<script>

$(document).ready(function(){
 $.ajax({ 
   url: "<?php echo site_url('category/fetch'); ?>",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
  		$('#treeview').treeview({data: data});
  		console.log(data);
   }   
 });

});

</script>
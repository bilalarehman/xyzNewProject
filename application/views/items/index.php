<div class="box box-primary">
	<div class="box-body">


		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addItem"><i class="fa fa-plus"></i> Add</button>


		<?php if (isset($infoItems[0])) { ?>
		
		<!-- table class="table table-bordered table-striped table-condensed table-all">
			<thead>
				<tr>
					<th>Items Name</th>
					<th>Items Category</th>
					<th>Category Allow</th>
					<th></th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>

			<tbody>
				<?php $sno=1; foreach ($infoItems as $c): ?>
				<tr>
					<td><?php echo $c->name; ?></td>
					<td><?php echo (array_key_exists($c->parent_id, $parentInfo)) ? $parentInfo[$c->parent_id] : ''; ?></td>
					<td><?php echo $c->allow; ?></td>
					<td>
						<div class="btn-group btn-group-xs">
							<a data-toggle="modal" data-target="#upItem_<?php echo $sno; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
							<a data-toggle="modal" data-target="#delItem_<?php echo $sno; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							
						</div>
					</td>
				</tr>


				<!-- Edit Items --
				<div id="upCat_<?php echo $sno; ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content--
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Item</h4>
							</div>
							<form action="" method="POST">
								<input type="hidden" name="id" value="<?php echo $c->id; ?>">
								<div class="modal-body">

									<div class="form-group">
										<label>Item Category</label>
										<?php echo form_dropdown('info[parent_id]', $parentInfo, $c->parent_id, 'class="select2 form-control" style="width:100%"'); ?>
									</div>

									<div class="form-group">
										<label>Item Name <span style="color: red;">*</span></label>
										<input type="text" name="info[name]" class="form-control" value="<?php echo $c->name; ?>" required>
									</div>

									<div class="form-group">
										<label>Allow</label>
										<?php echo form_dropdown('info[allow]', ['Y'=>'Allow', 'N'=>'Not Allow'], $c->allow, 'class="select2 form-control" style="width:100%"'); ?>
									</div>					
								</div>
								<div class="modal-footer">
									<button type="submit" name="upItem" class="btn btn-success">Save</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Delete Items --
				<div id="delCat_<?php echo $sno; ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content--
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Are You Sure You Want To Delete?</h4>
							</div>
							<form action="" method="POST">
								<input type="hidden" name="id" value="<?php echo $c->id; ?>">
								<div class="modal-body">
										<p>Are you sure you want delete This?</p>

								</div>
								<div class="modal-footer">
									<button type="submit" name="delItem" class="btn btn-danger">Delete</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</form>
					</div>
				</div>


				<?php $sno++; endforeach; ?>
			</tbody>

			
		</table -->

		<div id="treeview"></div>		

		<?php } else { ?>

		<div class="alert alert-info">Record Not Found!</div>

		<?php } ?>

	</div>
</div>



<!-- Add Items -->
<div id="addItem" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Items</h4>
			</div>
			<form action="" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label>Parent Category</label>
						<?php echo form_dropdown('info[parent_id]', $parentInfo, '', 'class="select2 form-control" style="width:100%"'); ?>
					</div>

					<div class="form-group">
						<label>Item Name <span style="color: red;">*</span></label>
						<input type="text" name="info[name]" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="addItem" class="btn btn-success">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
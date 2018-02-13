<div class="box box-primary">
	<div class="box-body">
		<form method="POST" action="">
			<div class="form-group">
				<label>Application Name</label>
				<input type="text" name="info[APP_NAME]" class="form-control" value="<?php echo $app_info[0]->APP_NAME; ?>" required>
			</div>
			<div class="form-group">
				<label>Application Logo</label>
				<input type="text" name="info[APP_LOGO]" class="form-control" value="<?php echo $app_info[0]->APP_LOGO; ?>" required>
			</div>			
			<div class="form-group">
				<label>Application Version</label>
				<input type="text" name="info[APP_VER]" class="form-control" value="<?php echo $app_info[0]->APP_VER; ?>" required>
			</div>
			<div class="form-group">
				<label>Application Developer Name</label>
				<input type="text" name="info[APP_DEV]" class="form-control" value="<?php echo $app_info[0]->APP_DEV; ?>" required>
			</div>	
			<div class="form-group">
				<label>Application Developer Website</label>
				<input type="text" name="info[APP_DEV_WEB]" class="form-control" value="<?php echo $app_info[0]->APP_DEV_WEB; ?>" required>
			</div>	
			<div class="form-group">
				<label>Application Copyright</label>
				<input type="text" name="info[APP_CR]" class="form-control" value="<?php echo $app_info[0]->APP_CR; ?>" required>
			</div>			

			<input type="submit" name="submit" value="Save" class="btn btn-success pull-right">									
		</form>
		
	</div>
</div>
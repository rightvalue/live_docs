<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Dcategory Edit</h3>
            </div>
			<?php echo form_open('dcategory/edit/'.$dcategory['dtype']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $dcategory['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save
                        </button>
                        <a class="btn btn-default" href="<?php echo site_url("dcategory/index")?>">
                            Cancel
                        </a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
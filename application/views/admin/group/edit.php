<div class="row">
<div class="col-md-6">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Fields with asterisk (*) are required</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php echo $form_url; ?>
      <div class="box-body">
        <div class="form-group">
          <label for="group_code">Group Code</label>
          <input type="text" name="group_code" class="form-control" id="group_code" placeholder="Enter Group Code" value="<?php echo set_value('group_code', $group->group_code); ?>">
        </div>

         <div class="form-group">
          <label for="group_name">Group Name</label>
          <input type="text" name="group_name" class="form-control" id="group_name" placeholder="Enter Group Name" value="<?php echo set_value('group_name', $group->group_name);?>">
        </div>
        
        

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks"><?php echo set_value('remarks', $group->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        <a href="<?php echo site_url('group')?>" class="btn btn-default btn-lg">Cancel</a>
      </div>
    <?php echo form_close(); ?>
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


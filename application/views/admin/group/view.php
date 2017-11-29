<div class="row">
<div class="col-md-6">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">All fields are un-editable</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
      <div class="box-body">
        <div class="form-group">
          <label for="group_code">Group Code</label>
          <input type="text" name="group_code" class="form-control" id="group_code" placeholder="Enter Group Code" value="<?php echo set_value('group_code', $group->group_code); ?>" readonly>
        </div>

         <div class="form-group">
          <label for="group_name">Group Name</label>
          <input type="text" name="group_name" class="form-control" id="group_name" placeholder="Enter Group Name" value="<?php echo set_value('group_name', $group->group_name);?>" readonly>
        </div>
        
       

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea readonly id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks"><?php echo set_value('remarks', $group->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
        <a href="<?php echo site_url('group')?>" class="btn btn-default btn-lg">Back</a>
      </div>
     
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


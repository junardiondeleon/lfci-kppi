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
          <label for="area_code">Area Code</label>
          <input type="text" name="area_code" class="form-control" id="area_code" placeholder="Enter Area Code" value="<?php echo set_value('area_code', $area->area_code); ?>" readonly>
        </div>

         <div class="form-group">
          <label for="area_name">Area Name</label>
          <input type="text" name="area_name" class="form-control" id="area_name" placeholder="Enter Area Name" value="<?php echo set_value('area_name', $area->area_name);?>" readonly>
        </div>
        
        

        <div class="form-group">
          <label for="street_no">Street No</label>
          <input type="text" name="street_no" class="form-control" id="street_no" placeholder="Enter Street No" value="<?php echo set_value('street_no', $area->street_no); ?>" readonly>
        </div>

        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" name="barangay" class="form-control" id="barangay" placeholder="Enter Barangay" value="<?php echo set_value('barangay', $area->barangay); ?>" readonly>
        </div>

        <div class="form-group">
          <label for="municipality">Municipality</label>
          <input type="text" name="municipality" class="form-control" id="municipality" placeholder="Enter Municipality" value="<?php echo set_value('municipality', $area->municipality); ?>" readonly>
        </div>

        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" name="province" class="form-control" id="province " placeholder="Enter Province" value="<?php echo set_value('province', $area->province); ?>" readonly>
        </div>

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" readonly><?php echo set_value('remarks', $area->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->
       <div class="box-footer">
        
        <a href="<?php echo site_url('area')?>" class="btn btn-default btn-lg">Back</a>
      </div>
      
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


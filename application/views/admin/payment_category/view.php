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
          <label for="payment_category_code">Payment Category Code</label>
          <input type="text" name="payment_category_code" class="form-control" id="payment_category_code" placeholder="Enter Payment Category Code" value="<?php echo set_value('payment_category_code', $payment_category->payment_category_code); ?>" disabled>
        </div>

         <div class="form-group">
          <label for="payment_category_name">Payment Category Name</label>
          <input type="text" name="payment_category_name" class="form-control" id="payment_category_name" placeholder="Enter Payment Category Name" value="<?php echo set_value('payment_category_name', $payment_category->payment_category_name);?>" disabled>
        </div>
        
      
       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" disabled><?php echo set_value('remarks', $payment_category->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        
        <a href="<?php echo site_url('payment_categories')?>" class="btn btn-default btn-lg">Back</a>
      </div>
   
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


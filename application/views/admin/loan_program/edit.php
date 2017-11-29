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
          <label for="loan_program_code">Loan Program Code</label>
          <input type="text" name="loan_program_code" class="form-control" id="loan_program_code" placeholder="Enter Loan Program Code" value="<?php echo set_value('loan_program_code', $loan_program->loan_program_code); ?>">
        </div>

        <div class="form-group">
          <label for="loan_program_name">Loan Program Name</label>
          <input type="text" name="loan_program_name" class="form-control" id="loan_program_name" placeholder="Enter Loan Program Name" value="<?php echo set_value('loan_program_name', $loan_program->loan_program_name);?>">
        </div>
        
        <div class="form-group">
          <label for="loan_program_description">Loan Program Description</label>
          <input type="text" name="loan_program_description" class="form-control" id="loan_program_description" placeholder="Enter Loan Program Description" value="<?php echo set_value('loan_program_description', $loan_program->loan_program_description); ?>"> </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks"><?php echo set_value('remarks', $loan_program->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-default btn-lg">Submit</button>
        <a href="<?php echo site_url('loan_program')?>" class="btn btn-default">Cancel</a>
      </div>
    <?php echo form_close(); ?>
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


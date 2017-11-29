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
          <label for="loan_program_code">Loan Program Code</label>
          <input type="text" name="loan_program_code" class="form-control" id="loan_program_code" placeholder="Enter Loan Program Code" value="<?php echo set_value('loan_program_code', $loan_program->loan_program_code); ?>"  readonly>
        </div>

         <div class="form-group">
          <label for="loan_program_name">Loan Program Name</label>
          <input type="text" name="loan_program_name" class="form-control" id="loan_program_name" placeholder="Enter Loan Program Name" value="<?php echo set_value('loan_program_name', $loan_program->loan_program_name);?>" readonly>
        </div>
        
        <div class="form-group">
          <label for="loan_program_description">Loan Program Description</label>
          <input type="text" name="loan_program_description" class="form-control" id="loan_program_description" placeholder="Enter Loan Program Description" value="<?php echo set_value('loan_program_description', $loan_program->loan_program_description); ?>" readonly> </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" readonly><?php echo set_value('remarks', $loan_program->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
   
        <a href="<?php echo site_url('loan_program')?>" class="btn btn-default btn-lg">Back</a>
      </div>
 
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


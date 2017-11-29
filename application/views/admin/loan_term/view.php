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
          <label for="LoanProgramId">Loan Program</label>
           <?php echo form_dropdown('LoanProgramId', $loan_programs, $this->input->post('LoanProgramId') ? $this->input->post('LoanProgramId') : $loan_term->LoanProgramId, 'id="LoanProgramId" class="form-control select2" disabled' ) ?>
        </div>

         <div class="form-group">
          <label for="loan_term">Loan Term</label>
          <input type="text" name="loan_term" class="form-control" id="loan_term" placeholder="Enter Loan Term" value="<?php echo set_value('loan_term', $loan_term->loan_term);?>" disabled>
        </div>
        
        <div class="form-group">
          <label for="loan_divisor">No of Days and Week</label>
          <input type="text" name="loan_divisor" class="form-control deci" id="loan_divisor" placeholder="Enter No of Days and Week" value="<?php echo set_value('loan_divisor', $loan_term->loan_divisor);?>" disabled>
        </div>

        <div class="form-group">
          <label for="interest">Interest</label>
          <input type="text" name="interest" class="form-control deci" id="interest" placeholder="Enter Interest" value="<?php echo set_value('interest', $loan_term->interest); ?>" disabled>
        </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" disabled><?php echo set_value('remarks', $loan_term->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
       
        <a href="<?php echo site_url('loan_term')?>" class="btn btn-default btn-lg">Back</a>
      </div>

  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


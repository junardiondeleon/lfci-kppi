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
           <?php echo form_dropdown('LoanProgramId', $loan_programs, $this->input->post('LoanProgramId') ? $this->input->post('LoanProgramId') : $loan_requirement->LoanProgramId, 'id="LoanProgramId" class="form-control select2" disabled' ) ?>
        </div>

         <div class="form-group">
          <label for="loan_requirement">Loan Requirement</label>
          <input type="text" name="loan_requirement" disabled class="form-control" id="loan_requirement" placeholder="Enter Loan Requirement" value="<?php echo set_value('loan_requirement', $loan_requirement->loan_requirement);?>">
        </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" disabled><?php echo set_value('remarks', $loan_requirement->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
       
        <a href="<?php echo site_url('loan_requirement')?>" class="btn btn-default btn-lg">Back</a>
      </div>

  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


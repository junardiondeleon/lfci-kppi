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
           <?php echo form_dropdown('LoanProgramId', $loan_programs, $this->input->post('LoanProgramId') ? $this->input->post('LoanProgramId') : $loan_collateral->LoanProgramId, 'id="LoanProgramId" class="form-control select2" disabled' ) ?>
        </div>

         <div class="form-group">
          <label for="loan_collateral">Loan Collateral</label>
          <input type="text" name="loan_collateral" disabled class="form-control" id="loan_collateral" placeholder="Enter Loan Collateral" value="<?php echo set_value('loan_collateral', $loan_collateral->loan_collateral);?>">
        </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" disabled><?php echo set_value('remarks', $loan_collateral->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
       
        <a href="<?php echo site_url('loan_collateral')?>" class="btn btn-default btn-lg">Back</a>
      </div>

  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


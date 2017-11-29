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
           <?php echo form_dropdown('LoanProgramId', $loan_programs, $this->input->post('LoanProgramId') ? $this->input->post('LoanProgramId') : $life_insurance->LoanProgramId, 'id="LoanProgramId" class="form-control select2" disabled' ) ?>
        </div>

         <div class="form-group">
          <label for="life_insurance">Loan Term</label>
          <input type="text" name="life_insurance" class="form-control" id="life_insurance" placeholder="Enter Loan Term" value="<?php echo set_value('life_insurance', $life_insurance->life_insurance);?>" disabled>
        </div>
        
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" name="amount" class="form-control deci" id="amount" placeholder="Enter Interest" value="<?php echo set_value('amount', $life_insurance->amount); ?>" disabled>
        </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" disabled><?php echo set_value('remarks', $life_insurance->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
       
        <a href="<?php echo site_url('life_insurance')?>" class="btn btn-default btn-lg">Back</a>
      </div>

  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


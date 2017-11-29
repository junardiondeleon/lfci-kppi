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
           <?php echo form_dropdown('LoanProgramId', $loan_programs, $this->input->post('LoanProgramId') ? $this->input->post('LoanProgramId') : $loan_category->LoanProgramId, 'id="LoanProgramId" class="form-control select2" disabled' ) ?>
        </div>

         <div class="form-group">
          <label for="loan_category_code">Loan Category Code</label>
          <input type="text" name="loan_category_code" class="form-control" id="loan_category_code" placeholder="Enter Category Code" value="<?php echo set_value('loan_category_code', $loan_category->loan_category_code);?>" disabled>
        </div>

        <div class="form-group">
          <label for="loan_category_name">Loan Category Name</label>
          <input type="text" name="loan_category_name" class="form-control" id="loan_category_name" placeholder="Enter Category Name" value="<?php echo set_value('loan_category_name', $loan_category->loan_category_name);?>" disabled>
        </div>
        
        <div class="form-group">
          <label for="min_loanable_amount">Minimum Loanable Amount</label>
          <input type="text" name="min_loanable_amount" class="form-control deci" id="min_loanable_amount" placeholder="Enter Minimum Loanable Amount" value="<?php echo set_value('min_loanable_amount', $loan_category->min_loanable_amount); ?>" disabled>
        </div>

        <div class="form-group">
          <label for="max_loanable_amount">Maximum Loanable Amount</label>
          <input type="text" name="max_loanable_amount" class="form-control deci" id="max_loanable_amount" placeholder="Enter Maximum Loanable Amount" value="<?php echo set_value('max_loanable_amount', $loan_category->max_loanable_amount); ?>" disabled>
        </div>
       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" disabled rows="3" placeholder="Remarks"><?php echo set_value('remarks', $loan_category->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
       
        <a href="<?php echo site_url('loan_category')?>" class="btn btn-default btn-lg">Back</a>
      </div>

  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>



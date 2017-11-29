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
          <label for="accounting_particular_code">Account Title Code</label>
          <input type="text" name="accounting_particular_code" class="form-control" id="accounting_particular_code" placeholder="Enter Account tiTle Code" value="<?php echo set_value('accounting_particular_code', $accounting_particular->accounting_particular_code); ?>" readonly>
        </div>

         <div class="form-group">
          <label for="accounting_particular_name">Account Title Name</label>
          <input type="text" name="accounting_particular_name" class="form-control" id="accounting_particular_name" placeholder="Enter Account tiTle Name" value="<?php echo set_value('accounting_particular_name', $accounting_particular->accounting_particular_name);?>" readonly>
        </div>
        
        <div class="form-group">
          <label for="accounting_particular_type">Account Title Type</label>
          <?php $types = array(''=>'','1'=>'Cash Voucher', '2'=>'Payment', '3'=>'Both'); ?>
                <?php echo form_dropdown('accounting_particular_type', $types, $this->input->post('accounting_particular_type') ? $this->input->post('civil_status') : $accounting_particular->accounting_particular_type, 'id="accounting_particular_type" class="form-control select2 disabled"' ) ?>

        </div>

       

        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks" readonly><?php echo set_value('remarks', $accounting_particular->remarks);?></textarea>
        </div>


         
      </div>
      <!-- /.box-body -->

      <div class="box-footer">

        <a href="<?php echo site_url('accounting_particulars')?>" class="btn btn-default">Cancel</a>
      </div>
    
  </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>


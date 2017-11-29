


<div class="row">
  <div class="col-md-6">
    <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">All fields with *  are required</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <?php echo $form_url; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group view-only">
          <label for="username">Transaction No</label>
          <input type="text" class="form-control" readonly name="username" id="username" placeholder="Enter Username" value="<?php echo set_value('username', $member_loan->transaction_no);?>">
        </div>
        
        
        <div class="form-group">
          <label for="remarks">Remarks</label>
           <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="Remarks"><?php echo set_value('remarks');?></textarea>
        </div>
        
       

       
      </div>
     
    </div>
    <!-- /.row -->
  </div>

  <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-lg">Save</button>
        <a href="<?php echo site_url($back)?>" class="btn btn-default btn-lg">Cancel</a>
      </div>
    <?php echo form_close(); ?>
</div>
  </div>
  <div class="col-md-6">
  <?php $this->load->view($alerts); ?>
  <?php $this->load->view($comments_view); ?>
 
</div>
</div>  




<div class="row">
  <div class="col-md-6">
    <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Account Information</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <?php echo $form_url; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group view-only">
          <label for="username">Username</label>
          <input type="text" class="form-control" readonly name="username" id="username" placeholder="Enter Username" value="<?php echo set_value('username', $user->username);?>">
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="">
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" value="">
        </div>
        
       

       
      </div>
     
    </div>
    <!-- /.row -->
  </div>

  <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        <a href="<?php echo site_url('users')?>" class="btn btn-default btn-lg">Cancel</a>
      </div>
    <?php echo form_close(); ?>
</div>
  </div>
  <div class="col-md-6">
  <?php $this->load->view($alerts); ?>
</div>  
</div>  

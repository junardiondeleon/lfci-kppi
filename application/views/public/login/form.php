<div class="login-box">
  <div class="login-logo">
   <?php echo img('assets/dist/img/kpp-logo-text.png'); ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
      Sign in to start your session
    </p>  
    <?php if(validation_errors()): ?>
                    
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>The following errors have occurred.</strong>
            <ul>            
                <?php echo validation_errors(); ?>
            </ul>
        </div>

    <?php endif; ?> 
    <?php if($this->session->flashdata('error')): ?>
        
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>
                <?php echo $this->session->flashdata('error'); ?>
            </strong>
        </div>

        
    <?php endif; ?> 
    
    <?php echo $form_url; ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" <?php echo set_value('password'); ?>>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>

    

    <a href="#">I forgot my password</a><br>
    
  </div>
  <!-- /.login-box-body -->
</div>
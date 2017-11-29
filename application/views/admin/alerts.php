
<?php if (validation_errors()): ?>  
     <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        
      <h4><i class="icon fa fa-ban"></i> Error!</h4>
      <strong>The following errors have occurred.</strong>
        <ul>            
            <?php echo validation_errors(); ?>
        </ul>
    </div>
<?php endif ?>


<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Error!</h4>
      <?php echo $this->session->flashdata('error'); ?>
    </div>
    

<?php endif ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
   
<?php endif ?>

<div class="row">
  <div class="col-md-3">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Search</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo $form_url; ?>
        <div class="box-body">
          <div class="form-user">
            <label for="search_fields">Field</label>
            <?php $search_fields = array('name'=>'Name','group_name'=>'User Group','area_name'=>'Area'); ?>
            <?php echo form_dropdown('by', $search_fields, $this->input->post('by'), 'id="by" class="form-control select2"' ) ?>
            
          </div>

           <div class="form-user">
            <label for="keywords">Keywords</label>
            <input type="text" name="keywords" class="form-control" id="keyword" placeholder="Enter Keywords" value="<?php echo set_value('keywords');?>">
          </div>
           
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" name="btn_action" class="btn btn-primary" value="Submit">Submit</button>
        </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-9">
    <?php $this->load->view($alerts); ?>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?php echo $box_title; ?></h3>

        <div class="box-tools">
          <?php 
            if (isset($pagination))
            echo $pagination; 
          ?>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-condensed table-hover">

      <tbody>
        <tr>
          <th width='5%'>#</th>
          <th width='30%'>Name</th>
          <th width='25%'>Area</th>
          <th width='20%'>User Group</th>
          <th width='15%'>Action</th>
        </tr>

        <?php if (count($users)): ?>
          <?php $counter = $record_no; ?>
          <?php foreach ($users as $user): ?>
            <tr <?php echo $this->session->flashdata('t_id') == $user->user_id ? "class='success'" : ''; ?> >
              <td><?php echo ++$counter;?></td>
              <td><?php echo $user->lastname . ', ' . $user->firstname; ?></td>
              <td><?php echo $user->area_name; ?></td>
              <td><?php echo $user->group_name; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Action</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                   
                    <li><a href="<?php echo base_url() . 'user/'. $user->user_id . '/edit'; ?>">Edit</a></li>

                    <li><a href="<?php echo base_url() . 'user/'. $user->user_id . '/reset_password'; ?>">Reset Password</a></li>
                    
                    <li><a href="<?php echo base_url() . 'user/'. $user->user_id . '/view'; ?>">View</a></li>
                   
                    <li><a href="<?php echo base_url() . 'user/'. $user->user_id . '/delete'; ?>" onclick="return confirm('You are about to delete a record. This is cannot be undone. Are you sure?');">Delete</a></li>
                   
                  </ul>
                </div>
               
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
            <tr>
              <td colspan="7">
                <span class="label label-danger">No record found!.</span>
              </td>
            </tr>
        <?php endif ?>
      </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

   
  </div>  
</div>
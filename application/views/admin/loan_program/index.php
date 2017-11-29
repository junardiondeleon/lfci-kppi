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
          <div class="form-group">
            <label for="search_fields">Field</label>
            <?php $search_fields = array('group_code'=>'Code', 'group_name'=>'Name'); ?>
            <?php echo form_dropdown('by', $search_fields, $this->input->post('by'), 'id="by" class="form-control select2"' ) ?>
            
          </div>

           <div class="form-group">
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
          <th width='25%'>Code</th>
          <th width='45%'>Name</th>
          <th width='15%'>Action</th>
        </tr>

        <?php if (count($loan_programs)): ?>
          <?php $counter = $record_no; ?>
          <?php foreach ($loan_programs as $loan_program): ?>
            <tr <?php echo $this->session->flashdata('t_id') == $loan_program->loan_program_id ? "class='success'" : ''; ?> >
              <td><?php echo ++$counter;?></td>
              <td><?php echo $loan_program->loan_program_code;?></td>
              <td><?php echo $loan_program->loan_program_name; ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Select</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url() . 'loan_program/'. $loan_program->loan_program_id . '/edit'; ?>">Edit</a></li>
                    <li><a href="<?php echo base_url() . 'loan_program/'. $loan_program->loan_program_id . '/view'; ?>">View</a></li>
                    <li><a href="<?php echo base_url() . 'loan_program/'. $loan_program->loan_program_id . '/delete'; ?>">Delete</a></li>
                    
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
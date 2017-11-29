<div class="row">
  <div class="col-md-3">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Search By Name</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo $form_url; ?>
        <div class="box-body">
          <div class="form-group">
            <label for="search_fields">Field</label>
            <?php $search_fields = array('lastname'=>'Lastname', 'firstname'=>'Firstname'); ?>
            <?php echo form_dropdown('by', $search_fields, $this->input->post('by'), 'id="by" class="form-control select2"' ) ?>
          </div>

           <div class="form-member">
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
          <?php if(config_item('teller_group_id') != $this->session->userdata('user_group_id')): ?>
          <th width='15%'>Area Name</th>
          <th width='15%'>Mobile No</th>
          <?php else: ?>
          <th width='25%'>Mobile No</th>
          <?php endif; ?>  
          <th width='20%'>Business Type</th>
          <th width='15%'>Action</th>
        </tr>

        <?php if (count($members)): ?>
          <?php $counter = $record_no; ?>
          <?php foreach ($members as $member): ?>
            <tr <?php echo $this->session->flashdata('t_id') == $member->member_id ? "class='success'" : ''; ?> >
              <td><?php echo ++$counter;?></td>
              <td><?php echo $member->lastname . ', ' . $member->firstname; ?></td>
              <?php if(config_item('teller_group_id') != $this->session->userdata('user_group_id')): ?>
              <td><?php echo $member->area_name; ?></td>
              <td><?php echo $member->mobile_no; ?></td>
              <?php else: ?>
              <td><?php echo $member->mobile_no; ?></td>
              <?php endif; ?> 

              <td><?php echo $member->business_type; ?></td>
              <td>
                <?php if(config_item('teller_group_id') == $this->session->userdata('user_group_id')): ?>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Select</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    

                    <li><a href="<?php echo base_url() . 'member/'. $member->member_id . '/edit'; ?>">Edit</a></li>

                   
                    
                    <li><a href="<?php echo base_url() . 'member/'. $member->member_id . '/view'; ?>">View</a></li>
                   
                    <li><a href="<?php echo base_url() . 'member/'. $member->member_id . '/delete'; ?>" onclick="return confirm('You are about to delete a record. This is cannot be undone. Are you sure?');">Delete</a></li>
                   
                  </ul>
                </div>
               <?php else: ?>
                <div class="btn-group">
                  <a href="<?php echo base_url() . 'member/'. $member->member_id . '/view'; ?>" class="btn btn-default btn-flat">View</a>
                </div> 

                <?php endif; ?>         
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
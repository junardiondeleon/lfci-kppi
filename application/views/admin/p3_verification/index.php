<div class="row">
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Search By</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo $form_url; ?>
        <div class="box-body">
          <div class="form-user">
            <label for="search_fields">Field</label>
            <?php $search_fields = array('name'=>'Name','transaction_no'=>'Transaction No'); ?>
            <?php echo form_dropdown('by', $search_fields, $this->input->post('by'), 'id="by" class="form-control select2" ' ) ?>
            
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
</div>
<div class="row">  
  <div class="col-md-12">
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
          
          <th width='12%'>Transaction No</th>
          <th width='10%'>Date of Filing</th>
           
          <th width='10%'>Area</th>
          
          <th width='25%'>Name</th>
          <th width='10%'>Mobile No</th>
          <th width='15%'>Business Type</th>
          <th width='10%'>Loan Amount</th>
          <th width='15%'>Action</th>
        </tr>

        <?php if (count($member_loans)): ?>
          <?php $counter = 0; ?>
          <?php foreach ($member_loans as $member_loan): ?>
            <tr <?php echo $this->session->flashdata('t_id') == $member_loan->member_loan_id ? "class='success'" : ''; ?> >
              
              <td><?php echo $member_loan->member_loan_id; ?></td>
              <td><?php echo $member_loan->date_of_filing; ?></td>
              
              <td><?php echo $member_loan->area_name; ?></td>
              
              <td><?php echo $member_loan->name; ?></td>
              <td><?php echo $member_loan->mobile_no; ?></td>
              <td><?php echo $member_loan->business_type; ?></td>
              <td><?php echo nf($member_loan->loan_amount); ?></td>
              <td>
              <?php if($queue == 'verification'): ?>

                  <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Action</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
  
                    <li><a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/assigned_to_me'; ?>" onclick="return confirm('You are about to assign a record. This is cannot be undone. Are you sure?');">Assigned to Me</a></li>
                    <li><a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/view'; ?>">View</a></li>
                    
                  </ul>
                </div>
               <?php elseif($queue == 'my_queue'): ?>

                  <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Action</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/view'; ?>">View</a></li>
                    <li><a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/verification'; ?>">Verification</a></li>
                    <li><a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/returned_to_queue'; ?>">Return to Queue</a></li>
                    <li><a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/add_comment'; ?>">Add Comment</a></li>
                  </ul>
                </div>
                  
                <?php elseif($queue == 'disapproved_loans' || $queue == 'approved_loans'): ?>       <div class="btn-group">
                  <a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/view'; ?>" class="btn btn-default btn-flat">View</a>
                 
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
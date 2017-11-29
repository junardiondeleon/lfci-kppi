<div class="row">

		 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $my_queue; ?></h3>

              <p>My Queue</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-th-list"></i>
            </div>
            <a href="<?php echo base_url(); ?>p3_verification/my_queue" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $for_verification; ?></h3>

              <p>For Verification</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-eye-open"></i>
            </div>
            <a href="<?php echo base_url(); ?>p3_verification" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $approved_loans; ?></h3>

              <p>Approved Loans</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-ok"></i>
            </div>
            <a href="<?php echo base_url(); ?>p3_verification/approved_loans" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $disapproved_loans; ?></h3>

              <p>Disapproved Loans</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-remove"></i>
            </div>
            <a href="<?php echo base_url(); ?>p3_verification/disapproved_loans" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
      </div>

<div class="row">
	<div class="col-lg-6 col-xs-6">
		<div class="box">
      <div class="box-header">
        <h3 class="box-title">Latest Loans for Verification</h3>

        <div class="box-tools">
          
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-condensed table-hover">

      <tbody>
        <tr>
          
          <th width='15%'>Transaction No</th>
          <th width='15%'>Date of Filing</th>
           
          
          
          <th width='25%'>Name</th>
          
          <th width='15%'>Loan Amount</th>
          <th width='15%'>Action</th>
        </tr>

        <?php if (count($member_loans)): ?>
          <?php $counter = 0; ?>
          <?php foreach ($member_loans as $member_loan): ?>
            <tr <?php echo $this->session->flashdata('t_id') == $member_loan->member_loan_id ? "class='success'" : ''; ?> >
              
              <td><?php echo $member_loan->member_loan_id; ?></td>
              <td><?php echo $member_loan->date_of_filing; ?></td>
              
          
              
              <td><?php echo $member_loan->name; ?></td>
              <td><?php echo nf($member_loan->loan_amount); ?></td>
              <td>
                   <div class="btn-group">
                  <a href="<?php echo base_url() . 'p3_verification/'. $member_loan->member_loan_id . '/view'; ?>" class="btn btn-default btn-flat">View</a>
                 
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
	<div class="col-lg-6 col-xs-6">
		 <div class="box">
      <div class="box-header">
        <h3 class="box-title">Latest Members</h3>

        <div class="box-tools">
          
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-condensed table-hover">

      <tbody>
        <tr>
          <th width='5%'>#</th>
          <th width='30%'>Name</th>
          <th width='20%'>Business Type</th>
          <th width='15%'>Action</th>
        </tr>

        <?php if (count($members)): ?>
          <?php $counter = 0; ?>
          <?php foreach ($members as $member): ?>
            <tr <?php echo $this->session->flashdata('t_id') == $member->member_id ? "class='success'" : ''; ?> >
              <td><?php echo ++$counter;?></td>
              <td><?php echo $member->lastname . ', ' . $member->firstname; ?></td>
              

              <td><?php echo $member->business_type; ?></td>
              <td>
             
                <div class="btn-group">
                  <a href="<?php echo base_url() . 'member/'. $member->member_id . '/view'; ?>" class="btn btn-default btn-flat">View</a>
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
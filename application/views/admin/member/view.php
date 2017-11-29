
<div class="row">
  <div class="col-md-6">
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Personal Information</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="">
    <div class="row">
  
      <div class="col-md-12">
        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Lastname" value="<?php echo set_value('lastname', $member->lastname);?>" disabled>
        </div>
        <div class="form-group">
          <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Firstname" value="<?php echo set_value('firstname', $member->firstname);?>" disabled>
        </div>
        <div class="form-group">
          <label for="middlename">Middlename</label>
          <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middlename" value="<?php echo set_value('middlename', $member->middlename);?>" disabled>
        </div>
         <div class="form-group">
          <label for="Age">Age</label>
          <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" value="<?php echo set_value('age', $member->age);?>" disabled>
        </div>
        <div class="form-group">
                <label for="gender">Gender</label>
                <?php $gender = array('Male'=>'Male', 'Female'=>'Female'); ?>
                <?php echo form_dropdown('gender', $gender, $this->input->post('gender') ? $this->input->post('gender') : $member->gender, 'id="gender" class="form-control select2"' ) ?>
              </div>
        
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker" name="birthday" id="birthday" placeholder="Enter Birthday" value="<?php echo set_value('birthday', $member->birthday);?>" disabled>
            
            </div>
            <!-- /.input group -->
        </div>

        <div class="form-group">
                <label for="civil_status">Civil Status</label>
                <?php $civil_statuses = array('Single'=>'Single', 'Married'=>'Married', 'Divorced'=>'Divorced', 'Widowed'=>'Widowed', 'Legally Separated'=>'Legally Separated'); ?>
                <?php echo form_dropdown('civil_status', $civil_statuses, $this->input->post('civil_status') ? $this->input->post('civil_status') : $member->civil_status, 'id="civil_status" class="form-control select2" disabled' ) ?>

                
              </div>
        
      </div>
      
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  
</div>
</div>

<div class="col-md-6">
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Contact Information</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="street_no">Street No</label>
          <input type="text" class="form-control" name="street_no" id="street_no" placeholder="Enter Street No" value="<?php echo set_value('street_no', $member->street_no);?>" disabled>
        </div>
        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Enter Barangay" value="<?php echo set_value('barangay', $member->barangay);?>" disabled>
        </div>
        <div class="form-group">
          <label for="municipality">Municipality</label>
          <input type="text" class="form-control" name="municipality" id="municipality" placeholder="Enter Municipality" value="<?php echo set_value('municipality', $member->municipality);?>" disabled>
        </div>
        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" class="form-control" name="province" id="province" placeholder="Enter Province" value="<?php echo set_value('province', $member->province);?>" disabled>
        </div>
        <div class="form-group">
          <label for="telephone_no">Telephone No</label>
          <input type="text" class="form-control" name="telephone_no" id="telephone_no" placeholder="Enter Telephone No" value="<?php echo set_value('telephone_no', $member->telephone_no);?>" disabled>
        </div>

        <div class="form-group">
          <label for="mobile_no">Mobile No</label>
          <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" value="<?php echo set_value('mobile_no', $member->mobile_no);?>" disabled>
        </div>

        <div class="form-group">
          <label for="business_type">Business Type</label>
          <input type="text" class="form-control" name="business_type" id="business_type" placeholder="Enter Email Address" value="<?php echo set_value('business_type', $member->business_type);?>" disabled>
        </div>
      </div>
     
    </div>
    <!-- /.row -->
  </div>
 
</div>
</div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Spouse Information</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
  </div>
 
  <div class="box-body" style="">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="spouse_lastname">Spouse Lastname</label>
          <input type="text" class="form-control" name="spouse_lastname" id="spouse_lastname" placeholder="Enter Spouse Lastname" value="<?php echo set_value('spouse_lastname', $member->spouse_lastname);?>" disabled>
        </div>
        <div class="form-group">
          <label for="spouse_firstname">Spouse Firstname</label>
          <input type="text" class="form-control" name="spouse_firstname" id="spouse_firstname" placeholder="Enter Spouse Firstname" value="<?php echo set_value('spouse_firstname', $member->spouse_firstname);?>" disabled>
        </div>
        <div class="form-group">
          <label for="spouse_middlename">Spouse Middlename</label>
          <input type="text" class="form-control" name="spouse_middlename" id="spouse_middlename" placeholder="Enter Spouse Middlename" value="<?php echo set_value('spouse_middlename', $member->spouse_middlename);?>" disabled>
        </div>
        <div class="form-group">
          <label for="spouse_contact_no">Spouse Contact No</label>
          <input type="text" class="form-control" name="spouse_contact_no" id="spouse_contact_no" placeholder="Enter Spouse Contact No" value="<?php echo set_value('spouse_contact_no', $member->spouse_contact_no);?>" disabled>
        </div>
       
      </div>
     
    </div>
    <!-- /.row -->
  </div>

  
    
</div>
  </div>

   <div class="col-md-6">
    <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Loan Profile Information</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
 
  <div class="box-body" style="">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="LoanProgramId">Loan Program</label>
          <?php echo form_dropdown('LoanProgramId', $loan_programs, $this->input->post('LoanProgramId') ? $this->input->post('LoanProgramId') : $member->LoanProgramId, 'id="LoanProgramId" class="form-control select2" disabled' ) ?>
        
        </div>
        <div class="form-group">
          <label for="LoanCategoryId">Loan Category</label>
          <?php echo form_dropdown('LoanCategoryId', $loan_categories, $this->input->post('LoanCategoryId') ? $this->input->post('LoanCategoryId') : $member->LoanCategoryId, 'id="LoanCategoryId" class="form-control select2" disabled' ) ?>
        
        </div>
        <div class="form-group">
          <label for="min_loanable_amount">Minimum Loanable Amount</label>
          <input type="text" class="form-control deci" name="min_loanable_amount" id="min_loanable_amount" placeholder="Enter Minimum Loanable Amount" value="<?php echo set_value('min_loanable_amount', $member->min_loanable_amount);?>" disabled>
        </div>
        <div class="form-group">
          <label for="max_loanable_amount">Maximun Loanable Amount</label>
          <input type="text" class="form-control deci" name="max_loanable_amount" id="max_loanable_amount" placeholder="Enter Maximun Loanable Amount" value="<?php echo set_value('max_loanable_amount', $member->max_loanable_amount);?>" disabled>
        </div>
       
      </div>
     
    </div>
    <!-- /.row -->
  </div>


</div>
  </div>
</div>  



<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

<div class="box-footer">
    
    <a href="<?php echo site_url('members')?>" class="btn btn-default btn-lg">Back</a>


  </div>

</div>
</div>
</div>
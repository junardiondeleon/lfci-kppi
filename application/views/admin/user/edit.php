
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
      <?php echo $form_url; ?>
      <div class="col-md-12">
        <div class="form-group">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Lastname" value="<?php echo set_value('lastname', $user->lastname);?>">
        </div>
        <div class="form-group">
          <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Firstname" value="<?php echo set_value('firstname', $user->firstname);?>">
        </div>
        <div class="form-group">
          <label for="middlename">Middlename</label>
          <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middlename" value="<?php echo set_value('middlename', $user->middlename);?>">
        </div>
         <div class="form-group">
          <label for="Age">Age</label>
          <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age" value="<?php echo set_value('age', $user->age);?>">
        </div>
        <div class="form-group">
                <label for="gender">Gender</label>
                <?php $gender = array('Male'=>'Male', 'Female'=>'Female'); ?>
                <?php echo form_dropdown('gender', $gender, $this->input->post('gender') ? $this->input->post('gender') : $user->gender, 'id="gender" class="form-control select2"' ) ?>
              </div>
        
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker" name="birthday" id="birthday" placeholder="Enter Birthday" value="<?php echo set_value('birthday', $user->birthday);?>">
            
            </div>
            <!-- /.input group -->
        </div>

        <div class="form-group">
                <label for="civil_status">Civil Status</label>
                <?php $civil_statuses = array('Single'=>'Single', 'Married'=>'Married', 'Divorced'=>'Divorced', 'Widowed'=>'Widowed', 'Legally Separated'=>'Legally Separated'); ?>
                <?php echo form_dropdown('civil_status', $civil_statuses, $this->input->post('civil_status') ? $this->input->post('civil_status') : $user->civil_status, 'id="civil_status" class="form-control select2"' ) ?>

                
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
          <input type="text" class="form-control" name="street_no" id="street_no" placeholder="Enter Street No" value="<?php echo set_value('street_no', $user->street_no);?>">
        </div>
        <div class="form-group">
          <label for="barangay">Barangay</label>
          <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Enter Barangay" value="<?php echo set_value('barangay', $user->barangay);?>">
        </div>
        <div class="form-group">
          <label for="municipality">Municipality</label>
          <input type="text" class="form-control" name="municipality" id="municipality" placeholder="Enter Municipality" value="<?php echo set_value('municipality', $user->municipality);?>">
        </div>
        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" class="form-control" name="province" id="province" placeholder="Enter Province" value="<?php echo set_value('province', $user->province);?>">
        </div>
        <div class="form-group">
          <label for="telephone_no">Telephone No</label>
          <input type="text" class="form-control" name="telephone_no" id="telephone_no" placeholder="Enter Telephone No" value="<?php echo set_value('telephone_no', $user->telephone_no);?>">
        </div>

        <div class="form-group">
          <label for="mobile_no">Mobile No</label>
          <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" value="<?php echo set_value('mobile_no', $user->mobile_no);?>">
        </div>

        <div class="form-group">
          <label for="email_address">Email Address</label>
          <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Enter Email Address" value="<?php echo set_value('email_address', $user->email_address);?>">
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
        <h3 class="box-title">Account Information</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
 
      <div class="box-body" style="">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="<?php echo set_value('username', $user->username);?>">
            </div>
            <?php if($show_password_fields): ?>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="">
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" value="">
            </div>
            <?php endif; ?>
            

           
          </div>
         
        </div>
        <!-- /.row -->
      </div>

      
    </div>
  </div>


  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Data Access</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
 
      <div class="box-body" style="">
        <div class="row">
          <div class="col-md-12">
            
            <div class="form-group">
              <label for="AreaId">Area</label>
              <?php echo form_dropdown('AreaId', $areas, $this->input->post('AreaId') ? $this->input->post('AreaId') : $user->AreaId, 'id="AreaId" class="form-control select2" data-placeholder="Please select an Area"' ) ?>
            </div>
            <div class="form-group">
              <label for="GroupId">User Group</label>
              <?php echo form_dropdown('GroupId', $groups, $this->input->post('GroupId') ? $this->input->post('GroupId') : $user->GroupId, 'id="GroupId" class="form-control select2" data-placeholder="Please select a User Group"' ) ?>
            </div>

            <div class="form-group">
              <label for="data_access">Data Access</label>
              
              <?php echo form_dropdown('data_access[]', $areas, $this->input->post('data_access[]') ? $this->input->post('data_access[]') : explode(',', $user->data_access), 'id="data_access" class="form-control select2" multiple="multiple" data-placeholder="Please select data access"' ) ?>  
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
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            <a href="<?php echo site_url('users')?>" class="btn btn-default btn-lg">Cancel</a>
          </div>
        <?php echo form_close(); ?>
    </div>
  </div>
</div>


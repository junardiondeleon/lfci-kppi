<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->config->item('site_name'); ?> | <?php echo $site_title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
  <?php echo link_tag('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>
  <?php echo link_tag('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>
  <?php echo link_tag('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>
  <?php echo link_tag('assets/bower_components/select2/dist/css/select2.min.css'); ?>
  <?php echo link_tag('assets/bower_components/jvectormap/jquery-jvectormap.css'); ?>
  <?php echo link_tag('assets/dist/css/AdminLTE.min.css'); ?>
  <?php echo link_tag('assets/dist/css/skins/_all-skins.min.css'); ?>
  <?php echo link_tag('assets/dist/css/override.css'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
 <?php echo link_tag('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'); ?>
 <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
</style>
</head>
<body class="layout-top-nav skin-green" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">


  <header class="main-header">  
    <nav class="navbar navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand"><b>Lawndale</b> Finance Company Inc. -  <?php echo $this->session->userdata('area_name'); ?></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
            <!-- User Account Menu -->
            <li><a><i class="fa fa-sign-in"></i> Signed in as </a></li>
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php $imgsrc = $this->session->userdata('gender') == 'Male' ? 'avatar5.png' : 'avatar3.png';  ?>
              <img src="<?php echo base_url(); ?>assets/dist/img/<?php echo $imgsrc; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname') ; ?>
                    </span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>reset_password">Change Password</a></li>
                <li><a href="<?php echo base_url(); ?>view_my_profile">View Profile</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>logout">Signed Out</a></li>
                
              </ul>
            
          </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <nav class="navbar navbar-static-top skin-blue" style="background: #006080;z-index: 0;">
      <div class="container-fluid">
        <div class="navbar-header">          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav pull-right">
             <li class=""><a href="<?php echo base_url(); ?>dashboard">
              <i class="fa fa-home"></i> Dashboard </a></li>
            
            
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-user-circle"></i> Members <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>members">Pangarap na Pondo sa Palengke</a></li>
              </ul>
            </li>

            <?php if(config_item('teller_group_id') == $this->session->userdata('user_group_id')): ?>
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-money"></i> Loan Programs <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>p3">Pangarap na Pondo sa Palengke</a></li>
              </ul>
            </li>  
            <?php endif; ?>

            <?php if(config_item('accounting_group_id') == $this->session->userdata('user_group_id') || config_item('bookkeeper_group_id') == $this->session->userdata('user_group_id')): ?>
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-money"></i> For Verification <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>p3_verification">Pangarap na Pondo sa Palengke</a></li>
                <li><a href="<?php echo base_url(); ?>p3_verification/my_queue">My Queue</a></li>
                <li><a href="<?php echo base_url(); ?>p3_verification/approved_loans">Approved Loans</a></li>
                <li><a href="<?php echo base_url(); ?>p3_verification/disapproved_loans">Disapproved Loans</a></li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(config_item('teller_group_id') == $this->session->userdata('user_group_id')): ?>
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-money"></i> Payments <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Loan Programs</a></li>
                <li><a href="#">Loan Categories</a></li>
                <li><a href="#">Loan Terms</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <?php endif; ?>
        </div>

        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(config_item('admin_group_id') == $this->session->userdata('user_group_id')): ?>
            <li><a href="<?php echo base_url(); ?>users"><i class="fa fa-users"></i> Users</a></li>
            <?php endif; ?>
            <?php if(config_item('accounting_group_id') == $this->session->userdata('user_group_id')): ?>
            <li class="dropdown ">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Accounting Data <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url(); ?>accounting_particulars">Account Titles</a></li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(config_item('admin_group_id') == $this->session->userdata('user_group_id')): ?>
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i> Application Data <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
               <li><a href="<?php echo base_url(); ?>loan_requirements">Loan Requirements</a></li>
               <li><a href="<?php echo base_url(); ?>loan_collaterals">Loan Collaterals</a></li>
               <li><a href="<?php echo base_url(); ?>loan_programs">Loan Programs</a></li>
               <li><a href="<?php echo base_url(); ?>loan_categories">Loan Categories</a></li>
               <li><a href="<?php echo base_url(); ?>loan_terms">Loan Terms</a></li>
               <li><a href="<?php echo base_url(); ?>mode_of_payments">Mode of Payments</a></li>
               <li><a href="<?php echo base_url(); ?>life_insurances">Life Insurances</a></li>
               <li><a href="<?php echo base_url(); ?>payment_categories">Payment Categories</a></li>  
              </ul>
            </li>
            <?php endif; ?>  
            <?php if(config_item('admin_group_id') == $this->session->userdata('user_group_id')): ?>
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i> System Data <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
               <li><a href="<?php echo base_url(); ?>groups">User Groups</a></li>
               <li><a href="<?php echo base_url(); ?>areas">Areas</a></li>
               
              </ul>
            </li>
            <?php endif; ?>  
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid" style="height: auto; min-height: 100%;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <div class="row">
        <div class="col-md-6">
      <h1>
        <?php echo $page_title; ?>
        <?php echo $sub_page_title; ?>
      </h1>
    </div>
    <div class="col-md-6">
       <h1 style="text-align: right">
      <?php echo $page_right_title; ?>
       <h1>
    </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content <?php echo ($view_only) ? 'view-only' : '' ?>">
        <div class="alert alert-danger alert-dismissible" id="js-error-display" style="display: none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          <strong>The following errors have occurred.</strong>
            <ul>            
                
            </ul>
        </div>
        <?php if($alerts_sidebar == FALSE): ?>
          
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

        <?php endif; ?>
        <?php $this->load->view($content); ?>
       
    
     
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  </div>
  <footer class="main-footer">
    <div class="container-fluid">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright © 2017 <?php echo $this->config->item('site_name'); ?>.</strong> All rights
      reserved.
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<?php echo script_tag('assets/bower_components/jquery/dist/jquery.min.js'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo script_tag('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>
<!-- FastClick -->
<?php echo script_tag('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>
<?php echo script_tag('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>
<?php echo script_tag('assets/bower_components/fastclick/lib/fastclick.js'); ?>
<!-- AdminLTE App -->
<?php echo script_tag('assets/dist/js/adminlte.min.js'); ?>
<?php echo script_tag('assets/dist/js/jquery.number.js'); ?>
<!-- Sparkline -->
<?php echo script_tag('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>
<!-- jvectormap  -->
<?php echo script_tag('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>
<?php echo script_tag('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>
<!-- SlimScroll -->
<?php echo script_tag('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>
<!-- ChartJS -->
<?php echo script_tag('assets/bower_components/Chart.js/Chart.js'); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo script_tag('assets/dist/js/pages/dashboard2.js'); ?>
<!-- AdminLTE for demo purposes -->
<?php echo script_tag('assets/dist/js/demo.js'); ?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy/mm/dd',
    })

    
    $('.deci').number( true, 2 )

    $('.selector').number( 1234, 2 );
  
    $('select#ModeOfPaymentId').on("select2:select", function(e) { 
        var mode_of_payment = $('#select2-ModeOfPaymentId-container').text();
        $('#mode_of_payment').val(mode_of_payment);
    });

    $('select#collector_id').on("select2:select", function(e) { 
        var collector_name = $('#select2-collector_id-container').text();
        $('#collector_name').val(collector_name);
    });

    $('select#LifeInsuranceId').on("select2:select", function(e) { 
       var life_insurance = $('#select2-LifeInsuranceId-container').text();
        $('#life_insurance').val(life_insurance);       
    });

    $('select#LoanTermId').on("select2:select", function(e) { 
       var loan_term = $('#select2-LoanTermId-container').text();
        $('#loan_term').val(loan_term);       
    });


    

    $('select#LoanCategoryId').on("select2:select", function(e) { 
       var loan_category_id =  $(this).val(); 
       if(parseInt(loan_category_id) !== 0)
       { 

        var form_data = {loan_category_id:loan_category_id};
        
          $.ajax({
            url:"<?php echo site_url('ajax_data/get_allowable_loan_amount'); ?>",
                     type:'POST',               
                     data:form_data,                          
                     beforeSend: function(){                   
                 
              },
                     success: function(data) {   
                    $('#min_loanable_amount').val(data[0].min_loanable_amount);
                     $('#max_loanable_amount').val(data[0].max_loanable_amount); 
                      
              }
          });

         

         
       }
       else
       {
         
          $('#max_loanable_amount').val(''); 
          $('#min_loanable_amount').val('');
         
       }

       
    });


    $('select#MemberId').on("select2:select", function(e) { 
       var member_id =  $(this).val(); 
       if(parseInt(member_id) !== 0)
       { 

        var form_data = {member_id:member_id};
        
          $.ajax({
            url:"<?php echo site_url('ajax_data/get_members'); ?>",
                     type:'POST',               
                     data:form_data,                          
                     beforeSend: function(){                   
                 
              },
                     success: function(data) {   
                    $('#name').val(data[0].name);
                     $('#street_no').val(data[0].street_no); 
                     $('#barangay').val(data[0].barangay); 
                     $('#municipality').val(data[0].municipality); 
                     $('#province').val(data[0].province); 
                     $('#mobile_no').val(data[0].mobile_no); 
                     $('#business_type').val(data[0].business_type); 
                     $('#loan_program').val(data[0].loan_program_name); 
                     $('#LoanCategoryId').val(data[0].LoanCategoryId); 
                     $('#loan_category').val(data[0].loan_category_name); 
                     $('#max_loanable_amount').val(data[0].max_loanable_amount); 
                     $('#min_loanable_amount').val(data[0].min_loanable_amount);  

                      
              }
          });

         

         
       }
       else
       {
          $('#name').val('');
          $('#street_no').val(''); 
          $('#barangay').val(''); 
          $('#municipality').val(''); 
          $('#province').val(''); 
          $('#mobile_no').val(''); 
          $('#business_type').val(''); 
          $('#loan_program_name').val(''); 
          $('#loan_category_name').val(''); 
          $('#max_loanable_amount').val(''); 
          $('#min_loanable_amount').val('');
          $('#loan_amount').val('');
       }

       
    });


    $('#btn_compute').on('click',function(e){
      e.preventDefault();
      $('#js-error-display ul li').remove()
      var error = false;
      var member_id =  $('#MemberId').val();
      var LifeInsuranceId = $('#LifeInsuranceId').val();
      var LoanTermId = $('#LoanTermId').val();
      var loan_amount = $('#loan_amount').val();
      var min_amount = $('#min_loanable_amount').val();
      var max_amount = $('#max_loanable_amount').val();
      var ModeOfPaymentId = $('#ModeOfPaymentId').val();

      
      if(member_id === '' || member_id === undefined)
      {

        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li class="member_error">Please select a Member</li>')
      }

      if(LifeInsuranceId === '' || LifeInsuranceId === undefined)
      {
        
        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li class="member_error">Please select a Life Insurance</li>')
      }

      if(LoanTermId === '' || LoanTermId === undefined)
      {
        
        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li class="member_error">Please select a Loan Term</li>')
      }

      if(ModeOfPaymentId === '' || ModeOfPaymentId === undefined)
      {
        
        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li class="member_error">Please select a Mode of Payment</li>')
      }

      if(loan_amount === '')
      {
        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li class="loan_amount_error">Please enter a Loan Amount</li>')
      }

      if(parseFloat(loan_amount) < parseFloat(min_amount))
      {
        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li class="min_amount_error">Loan amount is lower than the allowed minimum loanable amount </li>')
      }

      if(parseFloat(loan_amount) > parseFloat(max_amount))
      {
        error = true;
        $('#js-error-display').show();
        $('#js-error-display ul').append('<li lass="max_amount_error">Loan amount is greater than the allowed maximum loanable amount</li>')

      }
      
      if(error === false) {

      var form_data = {lterm_id:LoanTermId,loan_amount_val:loan_amount,life_insur_id:LifeInsuranceId};
        
      $.ajax({
        url:"<?php echo site_url('ajax_data/get_computation'); ?>",
                 type:'POST',               
                 data:form_data,                          
                 beforeSend: function(){                   
             
          },
                 success: function(data) {    
                  $('input[name=principal_amount]').val(loan_amount);
                  $('input[name=loan_protection_insurance]').val(data[0].loan_protection_insurance);
                  $('input[name=total_cash_out]').val(data[0].total_cash_out); 
                  $('input[name=kapamilya_insurance]').val(data[0].life_insurance);
                  $('input[name=notarial]').val(data[0].notarial);
                  $('input[name=service_charge]').val(data[0].service_charge);                  
                  $('input[name=advance_interest]').val(data[0].advance_interest);
                  $('input[name=net_proceeds]').val(data[0].net_proceeds); 
                  $('input[name=kasanib_fund]').val(data[0].kasanib_fund); 
                  $('input[name=total_account_receivable]').val(data[0].total_account_receivable); 
                  $('input[name=loan_amortization]').val(data[0].loan_amortization);
                  $('input[name=kasanib_amortization]').val(data[0].kasanib_amortization);
                  $('input[name=amortization_due]').val(data[0].amortization_due);

                  $('#amortization_due_display').text(data[0].amortization_due);
                  $('#total_account_receivable_display').text(data[0].total_account_receivable);
                  $('#total_cash_out_display').text(data[0].total_cash_out);
                  $('#net_proceeds_display').text(data[0].net_proceeds);
          }
      });   
      $('#js-error-display ul li').remove()
      $('#js-error-display').hide();
      }
    });


    $('#modal-default-approval').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); 
      var action = button.data('action'); 
      var message = button.data('message');       
      var modal = $(this);
      modal.find('.modal-body p').text(message);
      modal.find('.modal-footer #btn_action').val(action);
    })

  })
  
  


</script>

</body>
</html>